<?php
namespace app\modules\myTask\controllers;
use app\models\tables\Tasks;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class TaskController extends Controller
{
    public function actionIndex(){

        if (is_null($id = \Yii::$app->user->id)){
            $id = '0';
        }

        $query = Tasks::getDate($id);

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