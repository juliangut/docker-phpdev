<?php

/*
 * (c) 2023 Julián Gutiérrez <juliangut@gmail.com>
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/docker-phpdev
 */

declare(strict_types=1);

use Jgut\ECS\Config\ConfigSet82;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $header = <<<'HEADER'
    (c) 2023-{{year}} Julián Gutiérrez <juliangut@gmail.com>

    @license BSD-3-Clause
    @link https://github.com/juliangut/docker-phpdev
    HEADER;

    $ecsConfig->paths([
        __FILE__,
        __DIR__ . '/src',
    ]);

    (new ConfigSet82())
        ->setHeader($header)
        ->configure($ecsConfig);
};
