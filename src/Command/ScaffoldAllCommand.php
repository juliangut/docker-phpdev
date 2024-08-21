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
     * @param scaffoldVersions $versions
     */
    public function __construct(
        private readonly array $versions,
    ) {
        parent::__construct();
    }

    public static function getDefaultName(): ?string
    {
        return 'scaffold-all|s:a';
    }

    protected function configure(): void
    {
        $this
            ->setDescription('All Docker images scaffold')
            ->addOption('directory', null, InputOption::VALUE_OPTIONAL, 'Distribution directory', 'dist');
    }

    /**
     * @throws RuntimeException
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $ioStyle = new SymfonyStyle($input, $output);

        $directory = $input->getOption('directory');
        $this->assertStringType($directory);
        $directory = rtrim($directory, \DIRECTORY_SEPARATOR);
        $destinationDir = getcwd() . '/' . $directory;
        $this->removeDirectory($destinationDir);
        if (!mkdir($destinationDir, 0o755, true) && !is_dir($destinationDir)) {
            $ioStyle->error(\sprintf('Not possible to create "%s" directory', $destinationDir));
            $ioStyle->newLine();

            return self::FAILURE;
        }

        /** @var Application $application */
        $application = $this->getApplication();
        $scaffoldCommand = $application->find('scaffold-image');

        foreach ($this->versions as $variant => $variantConfig) {
            foreach (array_keys($variantConfig) as $version) {
                $scaffoldCommand->run(
                    new ArrayInput([
                        'command' => 'scaffold-image',
                        'variant' => $variant,
                        'version' => $version,
                        '--directory' => $directory . '/' . $variant . '/' . $version,
                    ]),
                    new NullOutput(),
                );
            }
        }

        $ioStyle->success('Images scaffolded');
        $ioStyle->newLine();

        return self::SUCCESS;
    }

    /**
     * @return scaffoldVersions
     */
    protected function getVersions(): array
    {
        return $this->versions;
    }

    final protected function removeDirectory(string $directory): void
    {
        if (!file_exists($directory)) {
            return;
        }

        if (!is_dir($directory)) {
            throw new RuntimeException(\sprintf('"%s" is not a directory.', $directory));
        }

        $this->recursiveRemove($directory);
    }

    private function recursiveRemove(string $path): void
    {
        $files = glob($path . '/*');
        if ($files !== false) {
            foreach ($files as $file) {
                is_dir($file) ? $this->recursiveRemove($file) : unlink($file);
            }
        }

        rmdir($path);
    }

    /**
     * @phpstan-assert string $value
     *
     * @throws RuntimeException
     */
    final protected function assertStringType(mixed $value): void
    {
        if (!\is_string($value)) {
            throw new RuntimeException('Not a string.');
        }
    }
}
