<?php
use yii\bootstrap\Html;

if(\Yii::$app->language == 'en'):
    echo Html::a('Go to Russian', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'ru']
    ));
else:
    echo Html::a('Перейти на английский', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
endif;