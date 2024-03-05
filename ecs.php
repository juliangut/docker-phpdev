<?php

/*
 * (c) 2016-2024 Julián Gutiérrez <juliangut@gmail.com>
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/docker-phpdev
 */

declare(strict_types=1);

use Jgut\ECS\Config\ConfigSet82;

return (new ConfigSet82())
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
