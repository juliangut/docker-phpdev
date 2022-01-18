<?php

namespace Jgut\Docker\PhpDev\Command;

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
     * @var string
     */
    protected static $defaultName = 'scaffold-image|s:i';

    /**
     * Twig renderer.
     *
     * @var Twig
     */
    private $twig;

    /**
     * Map of files to be scaffolded.
     *
     * @var array<string, array<string>>
     */
    private $templatesMap = [
        'cli' => [
            'php.ini.twig',
            'opcache.ini.twig',
            'apc.ini.twig',
            'xdebug.ini.twig',
            'cli/Dockerfile.twig',
            'cli/docker-entrypoint.twig',
        ],
        'fpm' => [
            'php.ini.twig',
            'opcache.ini.twig',
            'apc.ini.twig',
            'xdebug.ini.twig',
            'fpm/Dockerfile.twig',
            'fpm/docker-entrypoint.twig',
            'fpm/php-fpm.conf.twig',
        ],
        'jenkins' => [
            'php.ini.twig',
            'opcache.ini.twig',
            'apc.ini.twig',
            'xdebug.ini.twig',
            'jenkins/Dockerfile.twig',
            'jenkins/docker-entrypoint.twig',
        ],
    ];

    /**
     * Default images data.
     *
     * @var array<string, mixed>
     */
    private $defaultContext;

    /**
     * @param Twig                                 $twig
     * @param array<string, array<string, string>> $versions
     */
    public function __construct(Twig $twig, array $versions)
    {
        parent::__construct($versions);

        $this->twig = $twig;

        $noteComment = <<<NOTE
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
            'xdebug' => true,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Docker images scaffold')
            ->addArgument('variant', InputArgument::REQUIRED, 'Variant')
            ->addArgument('version', InputArgument::REQUIRED, 'Version')
            ->addOption('directory', null, InputOption::VALUE_OPTIONAL, 'Distribution directory', 'image');
    }

    /**
     * {@inheritdoc}
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @throws \RuntimeException
     *
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $ioStyle = new SymfonyStyle($input, $output);

        $versions = $this->getVersions();

        $variant = $input->getArgument('variant');
        if (!isset($versions[$variant])) {
            $ioStyle->error(\sprintf('Variant "%s" does not exist', $variant));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        $version = $input->getArgument('version');
        if (!isset($versions[$variant][$version])) {
            $ioStyle->error(\sprintf('Version "%s" does not exist', $version));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        $destinationDir = \getcwd() . '/' . \rtrim($input->getOption('directory'), \DIRECTORY_SEPARATOR);
        if (\is_dir($destinationDir) && \count(\scandir($destinationDir, \SCANDIR_SORT_ASCENDING)) !== 0) {
            $this->recursiveRemove($destinationDir);
        }
        if (!\mkdir($destinationDir, 0755, true) && !\is_dir($destinationDir)) {
            $ioStyle->error(\sprintf('Not possible to create "%s" directory', $destinationDir));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        $this->scaffoldTemplateFiles(
            $this->templatesMap[$variant],
            $destinationDir,
            \array_merge(
                $this->defaultContext,
                $versions[$variant][$version],
                [
                    'variant' => $variant,
                    'version' => $version,
                ]
            )
        );

        $ioStyle->success('Image scaffolded');
        $ioStyle->newLine();

        return self::SUCCESS;
    }

    /**
     * Scaffold templates files.
     *
     * @param array<string>       $files
     * @param string              $directory
     * @param array<string, mixed $context
     */
    private function scaffoldTemplateFiles(array $files, string $directory, array $context): void
    {
        foreach ($files as $sourceFile) {
            if ($context['xdebug'] === false && \basename($sourceFile) === 'xdebug.ini.twig') {
                continue;
            }

            $destinationFile = $directory . '/' . \basename($sourceFile);
            if (\substr($destinationFile, -5) === '.twig') {
                $destinationFile = \substr($destinationFile, 0, -5);
            }

            \file_put_contents($destinationFile, $this->twig->render($sourceFile, $context));
        }
    }
}
