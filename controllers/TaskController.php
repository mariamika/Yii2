<?php
namespace app\controllers;
use app\models\MyModel;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex(){

        $model = new MyModel();
        $model->country = 'Indonesia';
        $model->token = '465';
        var_dump($model->token,$model->country);
        var_dump($model->validate());
        var_dump($model->getErrors());
        exit;

        return $this->render('index', [
            'title' => 'Framework Yii',
            'content' => 'Приветствую!!! =)',

        ]);
    }
}