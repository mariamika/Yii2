<?php
namespace app\modules\admin\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * Lists all Performer models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}