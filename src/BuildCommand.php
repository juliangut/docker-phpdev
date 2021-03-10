<?php

namespace Jgut\Docker\PhpDev;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Twig\Environment as Twig;

/**
 * Build command.
 */
class BuildCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'build';

    /**
     * Build versions.
     *
     * @var array
     */
    private $versions;

    /**
     * Twig renderer.
     *
     * @var Twig
     */
    private $twig;

    /**
     * Default images data.
     *
     * @var string[]
     */
    private $defaultData;

    /**
     * BuildCommand constructor.
     *
     * @param Twig  $twig
     * @param array $versions
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(Twig $twig, array $versions)
    {
        parent::__construct();

        $this->twig = $twig;
        $this->versions = $versions;

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
        $xdebugCommand = '`curl -s https://github.com/xdebug/xdebug/releases.atom'
            . ' | grep "<title>[0-9]*\.[0-9]*\.[0-9]*</title>"'
            . ' | awk -F \'[<>]\' \'{ print $3; exit }\'`';

        $this->defaultData = [
            'root_allowed' => true,
            'note_comment' => $noteComment,
            'use_xdebug' => true,
            'xdebug_version' => $xdebugCommand,
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
            ->addOption('dir', 'd', InputArgument::OPTIONAL, 'Distribution directory', 'dist');
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
        $destinationDir = \getcwd() . '/' . \rtrim($input->getOption('dir'), \DIRECTORY_SEPARATOR);

        if (\is_dir($destinationDir) && \count(\scandir($destinationDir, \SCANDIR_SORT_ASCENDING)) !== 0) {
            $this->recursiveRemove($destinationDir);
        }

        $this->scaffoldCliImages($destinationDir . '/cli', $this->versions['cli']);
        $this->scaffoldFpmImages($destinationDir . '/fpm', $this->versions['fpm']);
        $this->scaffoldJenkinsImages($destinationDir . '/jenkins', $this->versions['jenkins']);

        $imagesCount = \count($this->versions['cli'])
            + \count($this->versions['fpm'])
            + \count($this->versions['jenkins']);

        $ioStyle = new SymfonyStyle($input, $output);
        $ioStyle->success(\sprintf('%s Docker images scaffolded', $imagesCount));
        $ioStyle->newLine();

        return self::SUCCESS;
    }

    /**
     * Scaffold CLI images.
     *
     * @param string $directory
     * @param array  $versions
     */
    private function scaffoldCliImages(string $directory, array $versions): void
    {
        $this->scaffoldImages(
            $directory,
            $versions,
            [
                'php.ini.twig',
                'opcache.ini.twig',
                'xdebug.ini.twig',
                'cli/Dockerfile.twig',
                'cli/docker-entrypoint.twig',
            ],
            [
                'build.twig',
            ]
        );
    }

    /**
     * Scaffold PHP-FPM images.
     *
     * @param string $directory
     * @param array  $versions
     */
    private function scaffoldFpmImages(string $directory, array $versions): void
    {
        $this->scaffoldImages(
            $directory,
            $versions,
            [
                'php.ini.twig',
                'opcache.ini.twig',
                'xdebug.ini.twig',
                'fpm/Dockerfile.twig',
                'fpm/docker-entrypoint.twig',
                'fpm/php-fpm.conf.twig',
            ],
            [
                'build.twig',
            ]
        );
    }

    /**
     * Scaffold Jenkins images.
     *
     * @param string $directory
     * @param array  $versions
     */
    private function scaffoldJenkinsImages(string $directory, array $versions): void
    {
        $this->scaffoldImages(
            $directory,
            $versions,
            [
                'php.ini.twig',
                'opcache.ini.twig',
                'xdebug.ini.twig',
                'jenkins/Dockerfile.twig',
                'jenkins/docker-entrypoint.twig',
            ],
            [
                'build.twig',
            ]
        );
    }

    /**
     * Scaffold images.
     *
     * @param string $directory
     * @param array  $versions
     * @param array  $templateFiles
     * @param array  $hookFiles
     */
    private function scaffoldImages(
        string $directory,
        array $versions,
        array $templateFiles,
        array $hookFiles
    ): void {
        foreach ($versions as $version => $data) {
            $versionDir = $directory . '/' . $version;
            if (!\mkdir($versionDir, 0755, true) && !\is_dir($versionDir)) {
                throw new \RuntimeException(\sprintf('Not possible to create "%s" directory', $versionDir));
            }

            $data = \array_merge(
                $this->defaultData,
                ['source_path' => basename($directory) . '/' . $version],
                $data
            );

            $this->scaffoldTemplateFiles($templateFiles, $versionDir, $data);

            $hooksDir = $versionDir . '/hooks';
            if (!\mkdir($hooksDir, 0755, true) && !\is_dir($hooksDir)) {
                throw new \RuntimeException(\sprintf('Not possible to create "%s" directory', $hooksDir));
            }

            $this->scaffoldHookFiles($hookFiles, $hooksDir, $data);
        }
    }

    /**
     * Scaffold templates files.
     *
     * @param array  $files
     * @param string $directory
     * @param array  $data
     */
    private function scaffoldTemplateFiles(array $files, string $directory, array $data): void
    {
        foreach ($files as $sourceFile) {
            if ($data['use_xdebug'] === false && \basename($sourceFile) === 'xdebug.ini.twig') {
                continue;
            }

            $destinationFile = $directory . '/' . \basename($sourceFile);
            if (\substr($destinationFile, -5) === '.twig') {
                $destinationFile = \substr($destinationFile, 0, -5);
            }

            \file_put_contents($destinationFile, $this->twig->render($sourceFile, $data));
        }
    }

    /**
     * Scaffold hook files.
     *
     * @param array  $files
     * @param string $directory
     * @param array  $data
     */
    private function scaffoldHookFiles(array $files, string $directory, array $data): void
    {
        foreach ($files as $sourceFile) {
            $destinationFile = $directory . '/' . \basename($sourceFile);
            if (\substr($destinationFile, -5) === '.twig') {
                $destinationFile = \substr($destinationFile, 0, -5);
            }

            \file_put_contents($destinationFile, $this->twig->render($sourceFile, $data));
        }
    }

    /**
     * Remove recursively.
     *
     * @param string $path
     */
    private function recursiveRemove(string $path): void {
        foreach (\glob($path . '/*') as $file) {
            \is_dir($file) ? $this->recursiveRemove($file) : \unlink($file);
        }

        \rmdir($path);
    }
}
