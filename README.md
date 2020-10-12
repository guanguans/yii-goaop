# yii-goaop

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
                frontend\aspects\MonitorAspect::class,
            ],
        ],
    ]
];
```