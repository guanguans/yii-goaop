# yii-goaop

![CI](https://github.com/guanguans/yii-goaop/workflows/CI/badge.svg)
[![StyleCI](https://github.styleci.io/repos/303249572/shield?branch=main)](https://github.styleci.io/repos/303249572?branch=main)
[![Latest Stable Version](https://poser.pugx.org/guanguans/yii-goaop/v)](//packagist.org/packages/guanguans/yii-goaop)
[![Total Downloads](https://poser.pugx.org/guanguans/yii-goaop/downloads)](//packagist.org/packages/guanguans/yii-goaop)
[![License](https://poser.pugx.org/guanguans/yii-goaop/license)](//packagist.org/packages/guanguans/yii-goaop)

> Bringing the goaop/framework to Yii. - 将 goaop/framework 集成到 Yii。

## Requirement

* Yii >= 2.0

## Installation

``` bash
$ composer require guanguans/yii-goaop -v
```

## Configuration

Config `config/main.php` file add:

``` php
<?php

return [
    'bootstrap' => [
        'aop',
    ],
    'components' => [
        'aop' => [
            'class'   => 'Guanguans\YiiGoAop\GoAopComponent',
            'initOption'  => [
                'debug'          => false,
                'appDir'         => dirname(__DIR__),
                'cacheDir'       => dirname(__DIR__).'/runtime/aspect',
                'cacheFileMode'  => 511,
                'features'       => 0,
                'includePaths'   => [
                    dirname(__DIR__),
                ],
                'excludePaths'   => [
                    dirname(__DIR__).'/config',
                    dirname(__DIR__).'/runtime',
                    dirname(__DIR__).'/tests',
                    dirname(__DIR__).'/views',
                    dirname(__DIR__).'/web',
                ],
                'containerClass' => \Go\Core\GoAspectContainer::class,
            ],
            'aspects' => [
                frontend\aspects\MonitorAspect::class, // yours aspects
            ],
        ],
    ]
];
```

## Usage

> to do

## Testing

``` bash
$ composer test
```

## Related Links

* [https://github.com/goaop/framework](https://github.com/goaop/framework)

## License

[MIT](LICENSE)