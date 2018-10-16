<?php
namespace app\controllers;
use app\models\MyModel;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex(){

        //$model = new MyModel();
        //$model->country = 'Indonesia';
        //$model->token = '465';
        //var_dump($model->token,$model->country);
        //var_dump($model->validate());
        //var_dump($model->getErrors());
        //exit;

        return $this->render('index', [
            'title' => 'Framework Yii',
            'content' => 'Приветствую!!! =)',

        ]);
    }

    public function actionTest(){
//        \Yii::$app->db->createCommand("
//            insert into test(title,content,created) values
//            ('title1','content1',NOW()),
//            ('title2','content2',NOW()),
//            ('title3','content3',NOW())
//        ")->execute();

//        $res = \Yii::$app->db->createCommand("
//            select * from test
//        ")->queryAll();

//        var_dump($res); exit;
    }
}