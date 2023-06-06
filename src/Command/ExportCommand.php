<?php

/*
 * (c) 2023 Julián Gutiérrez <juliangut@gmail.com>
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/docker-phpdev
 */

declare(strict_types=1);

namespace Jgut\Docker\PhpDev\Command;

use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Build export command.
 */
class ExportCommand extends Command
{
    protected static $defaultName = 'export-build|e:b';

    /**
     * @param scaffoldVersions $versions
     */
    public function __construct(
        private readonly array $versions,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Docker images build config export')
            ->addOption('pretty', null, InputOption::VALUE_NONE, 'Pretty print')
            ->addArgument('xdebug', InputArgument::REQUIRED, 'Default xdebug version');
    }

    /**
     * @throws RuntimeException
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $xdebugDefault = $input->getArgument('xdebug');

        $builds = [];
        foreach ($this->versions as $variant => $variantConfig) {
            foreach ($variantConfig as $version => $config) {
                $tags = array_map(
                    static fn(string $tag): string => 'juliangut/phpdev:' . trim($tag),
                    $config['tags'],
                );

                $builds[] = [
                    'variant' => $variant,
                    'version' => $version,
                    'xdebug' => $config['xdebug'] ?? $xdebugDefault,
                    'tags' => implode(',', $tags),
                ];
            }
        }

        $ioStyle = new SymfonyStyle($input, $output);

        $encodeOptions = \JSON_THROW_ON_ERROR | ($input->getOption('pretty') === true ? \JSON_PRETTY_PRINT : 0);
        $ioStyle->writeln(json_encode($builds, $encodeOptions));

        return self::SUCCESS;
    }
}
