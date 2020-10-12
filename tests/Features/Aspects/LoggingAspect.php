<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiGoAop\Tests\Features\Aspects;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;

class LoggingAspect implements Aspect
{
    /**
     * Method that will be called before real method.
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public Guanguans\YiiGoAop\Tests\Features\Logging::*(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(dirname(__DIR__).'/runtime/logging.log', 'this is a before method testing.'.PHP_EOL, FILE_APPEND);
    }

    /**
     * Method that will be called before real method.
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public Guanguans\YiiGoAop\Tests\Features\Logging::*(*))")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(dirname(__DIR__).'/runtime/logging.log', 'this is a after method testing.'.PHP_EOL, FILE_APPEND);
    }
}
