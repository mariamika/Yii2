<?php
namespace app\controllers;
use app\models\tables\Tasks;
use app\models\MyModel;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class TaskController extends Controller
{
    public function actionValidate(){

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

    public function actionIndex(){

        $query = Tasks::find()
            ->joinWith(['performer'])
            ->select(['tasks.*','performer.*'])
            ->where('month(dateCreate) = month(DATE(now()))');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        return $this->render('index',['dataProvider' => $dataProvider]);
    }

    public function actionCard($id){
        return $this->render('card', [
            'model' => $this->findTask($id),
        ]);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findTask($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}