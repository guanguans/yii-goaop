<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiGoAop\Tests;

use Go\Core\GoAspectContainer;
use Guanguans\YiiGoAop\AspectYiiKernel;
use Yii;

class GoAopComponentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->aop = Yii::$app->aop;
    }

    public function testInit()
    {
        $this->aop->init();
        $this->assertIsObject($this->aop->aspectKernel);
        $this->assertIsObject($this->aop->aspectContainer);
    }

    public function testGetAspectKernel()
    {
        $this->assertInstanceOf(AspectYiiKernel::class, $this->aop->getAspectKernel());
    }

    public function testGetAspectContainer()
    {
        $this->assertInstanceOf(GoAspectContainer::class, $this->aop->getAspectContainer());
    }

    public function testBootstrap()
    {
        $this->aop->bootstrap(Yii::$app);
        $this->assertIsArray($this->aop->getAspectContainer()->getByTag('aspect'));
        $this->assertNotEmpty($this->aop->getAspectContainer()->getByTag('aspect'));
    }
}
