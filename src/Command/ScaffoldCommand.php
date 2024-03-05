<?php

/*
 * (c) 2016-2024 Julián Gutiérrez <juliangut@gmail.com>
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/docker-phpdev
 */

declare(strict_types=1);

namespace Jgut\Docker\PhpDev\Command;

use RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Twig\Environment as Twig;

/**
 * Scaffold image files command.
 */
class ScaffoldCommand extends ScaffoldAllCommand
{
    /**
     * Map of files to be scaffolded.
     *
     * @var array<string, list<string>>
     */
    private array $templatesMap = [
        'cli' => [
            'php.ini.twig',
            'php-opcache.ini.twig',
            'php-apc.ini.twig',
            'php-xdebug.ini.twig',
            'cli/Dockerfile.twig',
            'cli/docker-entrypoint.twig',
        ],
        'fpm' => [
            'php.ini.twig',
            'php-opcache.ini.twig',
            'php-apc.ini.twig',
            'php-xdebug.ini.twig',
            'fpm/Dockerfile.twig',
            'fpm/docker-entrypoint.twig',
            'fpm/docker-healthcheck.twig',
            'fpm/php-fpm.conf.twig',
            'fpm/php-fpm-www.conf.twig',
        ],
        'jenkins' => [
            'php.ini.twig',
            'php-opcache.ini.twig',
            'php-apc.ini.twig',
            'php-xdebug.ini.twig',
            'jenkins/Dockerfile.twig',
            'jenkins/docker-entrypoint.twig',
        ],
    ];

    /**
     * @var scaffoldContext
     */
    private array $defaultContext;

    /**
     * @param scaffoldVersions $versions
     */
    public function __construct(
        private readonly Twig $twig,
        array $versions,
    ) {
        parent::__construct($versions);

        $noteComment = <<<'NOTE'
        ###
        #
        # NOTE
        #
        # This file has been automatically generated
        #
        # Do not edit it directly
        #
        ###
        NOTE;

        $this->defaultContext = [
            'comment' => $noteComment,
            'xdebug' => 'latest',
            'image' => '',
            'tags' => [],
            'variant' => '',
            'version' => '',
        ];
    }

    public static function getDefaultName(): ?string
    {
        return 'scaffold-image|s:i';
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Docker images scaffold')
            ->addArgument('variant', InputArgument::REQUIRED, 'Variant')
            ->addArgument('version', InputArgument::REQUIRED, 'Version')
            ->addOption('directory', null, InputOption::VALUE_OPTIONAL, 'Distribution directory', 'image');
    }

    /**
     * @throws RuntimeException
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $ioStyle = new SymfonyStyle($input, $output);

        $versions = $this->getVersions();

        $variant = $input->getArgument('variant');
        $this->assertStringType($variant);
        if (!\array_key_exists($variant, $versions)) {
            $ioStyle->error(sprintf('Variant "%s" does not exist', $variant));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        $version = $input->getArgument('version');
        $this->assertStringType($version);
        if (!\array_key_exists($version, $versions[$variant])) {
            $ioStyle->error(sprintf('Version "%s" does not exist', $version));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        $directory = $input->getOption('directory');
        $this->assertStringType($directory);
        $destinationDir = getcwd() . '/' . rtrim($directory, \DIRECTORY_SEPARATOR);
        $this->removeDirectory($destinationDir);
        if (!mkdir($destinationDir, 0o755, true) && !is_dir($destinationDir)) {
            $ioStyle->error(sprintf('Not possible to create "%s" directory', $destinationDir));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        /** @var scaffoldContext $context */
        $context = array_merge(
            $this->defaultContext,
            $versions[$variant][$version],
            [
                'variant' => $variant,
                'version' => $version,
            ],
        );

        $this->scaffoldTemplateFiles(
            $this->templatesMap[$variant],
            $destinationDir,
            $context,
        );

        $ioStyle->success('Image scaffolded');
        $ioStyle->newLine();

        return self::SUCCESS;
    }

    /**
     * @param list<string>    $files
     * @param scaffoldContext $context
     */
    private function scaffoldTemplateFiles(array $files, string $directory, array $context): void
    {
        foreach ($files as $sourceFile) {
            if ($context['xdebug'] === false && basename($sourceFile) === 'xdebug.ini.twig') {
                continue;
            }

            if (preg_match('/\.conf\.twig$/', basename($sourceFile)) === 1) {
                $context['comment'] = str_replace('#', ';', $context['comment']);
            }

            $destinationFile = $directory . '/' . basename($sourceFile);
            if (mb_substr($destinationFile, -5) === '.twig') {
                $destinationFile = mb_substr($destinationFile, 0, -5);
            }

            file_put_contents($destinationFile, $this->twig->render($sourceFile, $context));
        }
    }
}
