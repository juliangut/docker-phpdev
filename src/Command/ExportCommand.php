<?php

namespace Jgut\Docker\PhpDev\Command;

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
    /**
     * @var string
     */
    protected static $defaultName = 'export-build|e:b';

    /**
     * Build versions.
     *
     * @var array<string, array<string, string>>
     */
    private $versions;

    /**
     * @param array<string, array<string, string>> $versions
     */
    public function __construct(array $versions)
    {
        parent::__construct();

        $this->versions = $versions;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Docker images build config export')
            ->addOption('pretty', null, InputOption::VALUE_NONE, 'Pretty print')
            ->addArgument('xdebug', InputArgument::REQUIRED, 'Default xdebug version');
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
        $xdebugDefault = $input->getArgument('xdebug');

        $builds = [];
        foreach ($this->versions as $variant => $variantConfig) {
            foreach ($variantConfig as $version => $config) {
                $tags = array_map(
                    static function (string $tag): string {
                        return 'juliangut/phpdev:' . $tag;
                    },
                    $config['tags']
                );

                $builds[] = [
                    'variant' => $variant,
                    'version' => $version,
                    'xdebug' => $config['xdebug'] ?? $xdebugDefault,
                    'tags' => implode(',', array_map('trim', $tags))
                ];
            }
        }

        $ioStyle = new SymfonyStyle($input, $output);

        $encodeOptions = \JSON_THROW_ON_ERROR | ($input->getOption('pretty') === true ? JSON_PRETTY_PRINT : 0);
        $ioStyle->writeln(json_encode($builds, $encodeOptions));

        return self::SUCCESS;
    }
}
