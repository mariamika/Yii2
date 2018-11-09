<?php

namespace app\modules\base;

/**
 * Base module definition class
 */
class Base extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\base\controllers';
    public $defaultRoute = 'list';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
