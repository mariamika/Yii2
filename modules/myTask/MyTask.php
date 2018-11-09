<?php

namespace app\modules\myTask;

/**
 * myTask module definition class
 */
class MyTask extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\myTask\controllers';
    public $defaultRoute = 'task';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
