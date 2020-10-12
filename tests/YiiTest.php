<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiGoAop\Tests;

class YiiTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testYii()
    {
        $this->assertInstanceOf(\yii\base\Application::class, \yii::$app);
    }
}
