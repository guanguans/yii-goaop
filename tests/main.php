<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

$config = [
    'id' => 'yii-goaop',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'aop',
    ],
    'components' => [
        'aop' => [
            'class' => 'Guanguans\YiiGoAop\GoAopComponent',
            'initOption' => [
                /*
                 |--------------------------------------------------------------------------
                 | AOP Debug Mode
                 |--------------------------------------------------------------------------
                 |
                 | When AOP is in debug mode, then breakpoints in the original source
                 | code will work. Also engine will refresh cache files if the original
                 | files were changed.
                 |
                 | For production mode, no extra filemtime checks and better
                 | integration with opcache.
                 |
                 */
                'debug' => true,

                /*
                |--------------------------------------------------------------------------
                | Application Root Directory
                |--------------------------------------------------------------------------
                |
                | AOP will be applied only to the files in this directory, change it
                | to app_path() if needed.
                |
                */
                'appDir' => __DIR__,

                /*
                |--------------------------------------------------------------------------
                | AOP Cache Directory
                |--------------------------------------------------------------------------
                |
                | AOP engine will put all transformed files and caches in that directory.
                |
                */
                'cacheDir' => __DIR__.'/runtime/aspect',

                /*
                |--------------------------------------------------------------------------
                | Cache File Mode
                |--------------------------------------------------------------------------
                |
                | If configured then will be used as cache file mode for chmod.
                |
                */
                'cacheFileMode' => 511,

                /*
                |--------------------------------------------------------------------------
                | Miscellaneous AOP Engine Features
                |--------------------------------------------------------------------------
                |
                | This option should contain a bitmask of values defined in
                | \Go\Aop\Features enumeration:
                |
                | Support Options:
                |   1  - enables interception of system function.
                |   2  - enables interception of "new" operator in the source code.
                |   4  - enables interception of "include"/"require" operations
                |       in legacy code.
                |   64 - do not check the cache presence and assume that cache
                |       is already prepared
                |
                | <code>
                |   //
                |   // bitmask of 1 + 2 + 4 options.
                |   //
                |   'features' => 1 | 2 | 4,
                |
                | </code>
                |
                */
                'features' => 0,

                /*
                |--------------------------------------------------------------------------
                | Directories White List
                |--------------------------------------------------------------------------
                |
                | AOP will check this list to apply an AOP to selected directories only,
                | leave it empty if you want AOP to be applied to all files in the appDir.
                |
                */
                'includePaths' => [
                    __DIR__,
                ],

                /*
                |--------------------------------------------------------------------------
                | Directories Black List
                |--------------------------------------------------------------------------
                |
                | AOP will check this list to disable AOP for selected directories.
                |
                | Note: The App\Exceptions\Handler SHOULD NOT be handled by the
                | GO! AOP framework, since in case of fatal errors, it will not be
                | possible to correctly process an Exception.
                |
                */
                'excludePaths' => [
                    __DIR__.'/config',
                    __DIR__.'/runtime',
                    __DIR__.'/tests',
                    __DIR__.'/views',
                    __DIR__.'/web',
                ],

                /*
                |--------------------------------------------------------------------------
                | AOP Container
                |--------------------------------------------------------------------------
                |
                | This option can be useful for extension and fine-tuning of services.
                |
                */
                'containerClass' => \Go\Core\GoAspectContainer::class,
            ],
            'aspects' => [
                Guanguans\YiiGoAop\Tests\Aspects\MonitorAspect::class, // yours aspects
            ],
        ],
    ],
];

return $config;
