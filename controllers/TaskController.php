<?php
namespace app\controllers;
use app\models\tables\Tasks;
use app\models\Task;
use app\models\tables\UsersStudy;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex(){

        $model = new Task();
        $model->country = 'Indonesia';
        $model->token = '465';
        var_dump($model->token,$model->country);
        var_dump($model->validate());
        var_dump($model->getErrors());
        exit;

        return $this->render('index', [
            'content' => 'Приветствую!!! =)',

        ]);
    }

    public function actionTest(){

        /*Добавление в таблицу test новых данных
        \Yii::$app->db->createCommand("
            insert into test(title,content,created) values
            ('title1','content1',NOW()),
            ('title2','content2',NOW()),
            ('title3','content3',NOW())
        ")->execute();
        $res = \Yii::$app->db->createCommand("select * from test")->queryAll();
        var_dump($res);  */

        /* Запись
        $user = new UsersStudy();
        $user->login = 'Pupkin';
        $user->password = md5('qwerty');
        $user->role = 1;

        $user->save(); */

        /* Чтение

        $user = UsersStudy::findOne(1);
        $user->isNewRecord = true;
        $user->id = null;
        $user->login = 'a d m i n';
        $user->save(); */


        /* Удаление
        $user = UsersStudy::findOne(3);
        $user->delete(); */

        /* Связывание таблиц
        $user = UsersStudy::findOne(1);
        echo '<pre>'; var_dump($user->role); */

        //exit;
    }

    public function actionTask(){

        $result = Tasks::find()->where('month(dateCreate) = month(DATE(now()))')->all();
        return $this->render('index',['content' => $result]);
    }
}