<?php

namespace Jgut\Docker\PhpDev;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Twig_Environment;

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
    protected $versions = [];

    /**
     * Twig renderer.
     *
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * BuildCommand constructor.
     *
     * @param Twig_Environment $twig
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct(static::NAME);

        $this->twig = $twig;

        $this->versions = [
            'php' => [
                '5.6' => ['php_version' => '5.6', 'php_image' => 'php:5.6-alpine'],
                '7.0' => ['php_version' => '7.0', 'php_image' => 'php:7.0-alpine'],
                '7.1' => ['php_version' => '7.1', 'php_image' => 'php:7.1-alpine'],
            ],
            'fpm' => [
                '5.6' => ['php_version' => '5.6', 'php_image' => 'php:5.6-fpm-alpine'],
                '7.0' => ['php_version' => '7.0', 'php_image' => 'php:7.0-fpm-alpine'],
                '7.1' => ['php_version' => '7.1', 'php_image' => 'php:7.1-fpm-alpine'],
            ],
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
        $xDebugPackage = $this->findLatestXdebugPackage();
        $xDebugVersion = explode('-', $xDebugPackage)[1];

        if (is_dir($distDir)) {
            $this->recursiveRemove($distDir);
        }

        $this->scaffoldImages(
            $distDir . '/php',
            $this->versions['php'],
            [
                'php.ini',
                'xdebug.ini',
                'php/Dockerfile',
                'php/docker-entrypoint.sh',
            ],
            [
                'xdebug_version' => $xDebugVersion,
                'xdebug_package' => $xDebugPackage,
            ]
        );

        $this->scaffoldImages(
            $distDir . '/fpm',
            $this->versions['fpm'],
            [
                'php.ini',
                'xdebug.ini',
                'fpm/Dockerfile',
                'fpm/docker-entrypoint.sh',
                'fpm/php-fpm.conf',
            ],
            [
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
     * @param array  $defaultData
     *
     * @throws \RuntimeException
     */
    protected function scaffoldImages(string $distDir, array $versions, array $templateFiles, array $defaultData = [])
    {
        foreach ($versions as $version => $data) {
            $versionDir = $distDir . '/' . $version;

            if (!mkdir($versionDir, 0755, true) && !is_dir($versionDir)) {
                throw new \RuntimeException(sprintf('Not possible to create "%s" directory', $versionDir));
            }

            foreach ($templateFiles as $templateFile) {
                $generatedFile = basename($templateFile);

                file_put_contents(
                    $versionDir . '/' . $generatedFile,
                    $this->twig->render($templateFile . '.twig', array_merge($defaultData, $data))
                );
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
     * Get latest xDebug package.
     *
     * @return string
     */
    private function findLatestXdebugPackage(): string
    {
        $rss = simplexml_load_string(file_get_contents('https://pecl.php.net/feeds/pkg_xdebug.rss'));

        return str_replace(' ', '-', $rss->item[0]->title);
    }
}
