<?php

namespace Jgut\Docker\PhpDev;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Build command.
 */
class BuildCommand extends Command
{
    /**
     * Command name.
     */
    const NAME = 'build';

    /**
     * Build versions.
     *
     * @var array
     */
    private $versions;

    /**
     * Twig renderer.
     *
     * @var \Twig_Environment
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
     * @param \Twig_Environment $twig
     * @param array             $versions
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(\Twig_Environment $twig, array $versions)
    {
        parent::__construct(static::NAME);

        $this->twig = $twig;
        $this->versions = $versions;

        $noteComment = <<<EOL
###
#
# NOTE!
#
# This file has been automatically generated
#
# Do not edit it directly
#
###
EOL;
        $xdebugCommand = '`curl -s https://pecl.php.net/feeds/pkg_xdebug.rss'
            . ' | grep "<title>xdebug [0-9]*\.[0-9]*\.[0-9]*</title>"'
            . ' | sed \'s/\s\+/ /g\''
            . ' | awk -F \'[ <]\' \'{ print $4; exit }\'`';

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
    protected function configure()
    {
        $this->setName(static::NAME)
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
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $destinationDir = \getcwd() . '/' . \rtrim($input->getOption('dir'), \DIRECTORY_SEPARATOR);

        if (\is_dir($destinationDir) && \count(\scandir($destinationDir, SCANDIR_SORT_ASCENDING)) !== 0) {
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
    }

    /**
     * Scaffold CLI images.
     *
     * @param string $directory
     * @param array  $versions
     */
    private function scaffoldCliImages(string $directory, array $versions)
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
    private function scaffoldFpmImages(string $directory, array $versions)
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
    private function scaffoldJenkinsImages(string $directory, array $versions)
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
    ) {
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
     *
     * @return void
     */
    private function scaffoldTemplateFiles(array $files, string $directory, array $data)
    {
        foreach ($files as $sourceFile) {
            if (\basename($sourceFile) === 'xdebug.ini.twig' && $data['use_xdebug'] === false) {
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
     *
     * @return void
     */
    private function scaffoldHookFiles(array $files, string $directory, array $data)
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
    private function recursiveRemove(string $path) {
        foreach (\glob($path . '/*') as $file) {
            \is_dir($file) ? $this->recursiveRemove($file) : \unlink($file);
        }

        \rmdir($path);
    }
}
