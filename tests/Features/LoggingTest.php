<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiGoAop\Tests\Features;

use Guanguans\YiiGoAop\Tests\TestCase;

class LoggingTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testLoggingAspect()
    {
        $this->assertTrue(Logging::logging());
        $this->assertFileExists(__DIR__.'/runtime/logging.log');
    }
}
