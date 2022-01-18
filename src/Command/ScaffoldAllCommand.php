<?php

namespace Jgut\Docker\PhpDev\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Scaffold all image files command.
 */
class ScaffoldAllCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'scaffold-all|s:a';

    /**
     * Build versions.
     *
     * @var array<string, array<string, string>>
     */
    protected $versions;

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
            ->setDescription('All Docker images scaffold')
            ->addOption('directory', null, InputOption::VALUE_OPTIONAL, 'Distribution directory', 'dist');
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

        $directory = \rtrim($input->getOption('directory'), \DIRECTORY_SEPARATOR);
        $destinationDir = \getcwd() . '/' . $directory;
        if (\is_dir($destinationDir) && \count(\scandir($destinationDir, \SCANDIR_SORT_ASCENDING)) !== 0) {
            $this->recursiveRemove($destinationDir);
        }
        if (!\mkdir($destinationDir, 0755, true) && !\is_dir($destinationDir)) {
            $ioStyle->error(\sprintf('Not possible to create "%s" directory', $destinationDir));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        /** @var Application $application */
        $application = $this->getApplication();
        $scaffoldCommand = $application->find('scaffold-image');

        foreach ($this->versions as $variant => $variantConfig) {
            foreach (\array_keys($variantConfig) as $version) {
                $scaffoldCommand->run(
                    new ArrayInput([
                        'command' => 'scaffold-image',
                        'variant' => $variant,
                        'version' => $version,
                        '--directory' => $directory . '/' . $variant . '/' . $version,
                    ]),
                    new NullOutput()
                );
            }
        }

        $ioStyle->success('Images scaffolded');
        $ioStyle->newLine();

        return self::SUCCESS;
    }

    /**
     * @return array<string, array<string, string>>
     */
    protected function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * Remove recursively.
     *
     * @param string $path
     */
    final protected function recursiveRemove(string $path): void {
        foreach (\glob($path . '/*') as $file) {
            \is_dir($file) ? $this->recursiveRemove($file) : \unlink($file);
        }

        \rmdir($path);
    }
}
