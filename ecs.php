<?php

/*
 * (c) 2016-2025 Julián Gutiérrez <juliangut@gmail.com>
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/docker-phpdev
 */

declare(strict_types=1);

use Jgut\ECS\Config\ConfigSet83;

return (new ConfigSet83())
    ->setHeader(<<<'HEADER'
    (c) 2016-{{year}} Julián Gutiérrez <juliangut@gmail.com>

    @license BSD-3-Clause
    @link https://github.com/juliangut/docker-phpdev
    HEADER)
    ->configureBuilder()
    ->withPaths([
        __FILE__,
        __DIR__ . '/src',
    ]);
