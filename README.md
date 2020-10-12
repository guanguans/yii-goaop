# yii-goaop

![CI](https://github.com/guanguans/yii-goaop/workflows/CI/badge.svg)
[![Build Status](https://travis-ci.org/guanguans/yii-goaop.svg?branch=main)](https://travis-ci.org/guanguans/yii-goaop)
[![codecov](https://codecov.io/gh/guanguans/yii-goaop/branch/main/graph/badge.svg)](https://codecov.io/gh/guanguans/yii-goaop)
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
                // AOP Debug Mode
                'debug'          => false,
                // Application Root Directory
                'appDir'         => dirname(dirname(__DIR__)),
                // AOP Cache Directory
                'cacheDir'       => dirname(__DIR__).'/runtime/aspect',
                // Cache File Mode
                'cacheFileMode'  => 511,
                // Miscellaneous AOP Engine Features
                'features'       => 0,
                // Directories White List
                'includePaths'   => [
                    dirname(__DIR__),
                ],
                // Directories Black List
                'excludePaths'   => [
                    dirname(__DIR__).'/config',
                    dirname(__DIR__).'/runtime',
                    dirname(__DIR__).'/tests',
                    dirname(__DIR__).'/views',
                    dirname(__DIR__).'/web',
                ],
                // AOP Container
                'containerClass' => \Go\Core\GoAspectContainer::class,
            ],
            // yours aspects
            'aspects' => [
                frontend\aspects\LoggingAspect::class,
            ],
        ],
    ]
];
```

## Usage

### Create yours aspect

``` php
<?php

namespace frontend\aspects;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Yii;

class LoggingAspect implements Aspect
{
    /**
     * Method that will be called before real method
     * @param  MethodInvocation  $invocation  Invocation
     * @Before("execution(public frontend\controllers\SiteController->*Index(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(Yii::$app->getRuntimePath().'/logs/logging.log', 'this is a before method testing.'.PHP_EOL, FILE_APPEND);
    }

    /**
     * Method that will be called before real method
     * @param  MethodInvocation  $invocation  Invocation
     * @Before("execution(public frontend\controllers\SiteController->*Index(*))")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(Yii::$app->getRuntimePath().'/logs/logging.log', 'this is a after method testing.'.PHP_EOL, FILE_APPEND);
    }
}
```

### Run `frontend\controllers\SiteController\actionIndex` action

### `cat frontend/runtime/logs/logging.log`

## Testing

``` bash
$ composer test
```

## Related Links

* [https://github.com/goaop/framework](https://github.com/goaop/framework)

## License

[MIT](LICENSE)