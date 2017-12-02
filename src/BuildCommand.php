<?php

namespace Jgut\Docker\PhpDev;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
    protected $versions;

    /**
     * Twig renderer.
     *
     * @var \Twig_Environment
     */
    protected $twig;

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
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName(static::NAME)
            ->setDescription('Scaffold Docker images')
            ->addOption('dir', 'd', InputArgument::OPTIONAL, 'Dist directory', 'dist');
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
        $distDir = getcwd() . '/' . rtrim($input->getOption('dir'), '/');
        $xDebugVersion = $this->findLatestXdebugVersion();
        $xDebugPackage = 'xdebug-' . $xDebugVersion;

        if (is_dir($distDir)) {
            $this->recursiveRemove($distDir);
        }

        $this->scaffoldImages(
            $distDir . '/php',
            $this->versions['php'],
            [
                'php.ini.twig',
                'xdebug.ini.twig',
                'php/Dockerfile.twig',
                'php/docker-entrypoint.twig',
            ],
            [
                'build',
            ],
            [
                'use_xdebug' => true,
                'xdebug_version' => $xDebugVersion,
                'xdebug_package' => $xDebugPackage,
            ]
        );

        $this->scaffoldImages(
            $distDir . '/fpm',
            $this->versions['fpm'],
            [
                'php.ini.twig',
                'xdebug.ini.twig',
                'fpm/Dockerfile.twig',
                'fpm/docker-entrypoint.twig',
                'fpm/php-fpm.conf.twig',
            ],
            [
                'build',
            ],
            [
                'use_xdebug' => true,
                'xdebug_version' => $xDebugVersion,
                'xdebug_package' => $xDebugPackage,
            ]
        );

        $output->writeln('<info>Docker images scaffold done</info>');
        $output->writeln('');
    }

    /**
     * Scaffold versions.
     *
     * @param string $distDir
     * @param array  $versions
     * @param array  $templateFiles
     * @param array  $hookFiles
     * @param array  $defaultData
     *
     * @throws \RuntimeException
     */
    protected function scaffoldImages(
        string $distDir,
        array $versions,
        array $templateFiles,
        array $hookFiles,
        array $defaultData = []
    ) {
        foreach ($versions as $version => $data) {
            $versionDir = $distDir . '/' . $version;
            if (!mkdir($versionDir, 0755, true) && !is_dir($versionDir)) {
                throw new \RuntimeException(sprintf('Not possible to create "%s" directory', $versionDir));
            }

            foreach ($templateFiles as $sourceFile) {
                $destinationFile = $versionDir . '/' . basename($sourceFile);
                if (substr($destinationFile, -5) === '.twig') {
                    $destinationFile = substr($destinationFile, 0, -5);
                }

                file_put_contents($destinationFile, $this->twig->render($sourceFile, array_merge($defaultData, $data)));
            }

            $hooksDir = $versionDir . '/hooks';
            if (!mkdir($hooksDir, 0755, true) && !is_dir($hooksDir)) {
                throw new \RuntimeException(sprintf('Not possible to create "%s" directory', $hooksDir));
            }

            foreach ($hookFiles as $sourceFile) {
                $destinationFile = $hooksDir . '/' . basename($sourceFile);
                if (substr($destinationFile, -5) === '.twig') {
                    $destinationFile = substr($destinationFile, 0, -5);
                }

                file_put_contents($destinationFile, $this->twig->render($sourceFile, array_merge($defaultData, $data)));
            }
        }
    }

    /**
     * Remove recursively.
     *
     * @param string $path
     */
    protected function recursiveRemove(string $path) {
        foreach (glob($path . '/*') as $file) {
            is_dir($file) ? $this->recursiveRemove($file) : unlink($file);
        }

        rmdir($path);
    }

    /**
     * Get latest xDebug version.
     *
     * @return string
     */
    private function findLatestXdebugVersion(): string
    {
        $version = null;
        $rss = simplexml_load_string(file_get_contents('https://pecl.php.net/feeds/pkg_xdebug.rss'));

        foreach ($rss->item as $release) {
            if (preg_match('/^xdebug\s(\d+\.\d+(\.\d+)?)$/', $release->title, $matches)) {
                $version = $matches[1];
                break;
            }
        }

        return $version;
    }
}
