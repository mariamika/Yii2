<?php
namespace app\controllers;
use app\models\tables\Tasks;
use app\models\MyModel;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex(){

        $model = new MyModel();
        $model->country = 'dbd';
        $model->token = '/*';
        var_dump($model->token,$model->country);
        var_dump($model->validate());
        var_dump($model->getErrors());
        exit;

//        return $this->render('index', [
//            'content' => 'Приветствую!!! =)',
//
//        ]);
    }

    public function actionTask(){

        $result = Tasks::find()
            ->joinWith(['performer'])
            ->select(['tasks.*','performer.*'])
            ->where('month(dateCreate) = month(DATE(now()))')->all();

        return $this->render('index',['content' => $result]);
    }
}