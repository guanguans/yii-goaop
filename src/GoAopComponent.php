<?php

/*
 * This file is part of the guanguans/yii-goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiGoAop;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Component;

/**
 * Class AopComponent.
 */
class GoAopComponent extends Component implements BootstrapInterface
{
    /**
     * @var array
     */
    public $initOptions = [];

    /**
     * @var array
     */
    public $aspects = [];

    /**
     * @var \Guanguans\YiiGoAop\AspectYiiKernel
     */
    protected $aspectKernel;

    /**
     * @var \Go\Core\AspectContainer
     */
    protected $aspectContainer;

    /**
     * Initializes the object.
     * This method is invoked at the end of the constructor after the object is initialized with the given configuration.
     */
    public function init()
    {
        parent::init();

        $aspectYiiKernel = AspectYiiKernel::getInstance();
        $aspectYiiKernel->init($this->initOptions);

        $this->aspectKernel = $aspectYiiKernel;
        $this->aspectContainer = $aspectYiiKernel->getContainer();
    }

    /**
     * @return \Guanguans\YiiGoAop\AspectYiiKernel|null
     */
    public function getAspectKernel()
    {
        return $this->aspectKernel;
    }

    /**
     * @return \Go\Core\AspectContainer|null
     */
    public function getAspectContainer()
    {
        return $this->aspectContainer;
    }

    /**
     * @param \yii\base\Application $app
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function bootstrap($app)
    {
        // Let's collect all aspects and just register them in the container
        foreach ($this->aspects as $aspect) {
            $this->aspectContainer->registerAspect(Yii::createObject($aspect));
        }

        spl_autoload_unregister(['Yii', 'autoload']); // This will disable Yii2 autoloader.
    }
}
