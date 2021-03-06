<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\tables\Performer;
use app\models\tables\Tasks;
use app\models\TaskSearch;
use app\models\tables\Files;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AdminTaskController implements the CRUD actions for Tasks model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('createTask')){
            $searchModel = new TaskSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('access');
        }

    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model_pic = $this->findFiles($model->id_task);

        return $this->render('view', [
            'model' => $model,
            'model_pic' => $model_pic,
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();
        $model_pic = new Files();
        $items = ArrayHelper::map(Performer::find()->all(),'index','name');

        if ($model->load(Yii::$app->request->post()) && $model_pic->load(Yii::$app->request->post())) {
            $model_pic->file = UploadedFile::getInstances($model_pic,'file');
            if ($model->validate() && $model->save()){
                if ($model_pic->file && $model_pic->uploadFile()){
                    foreach ($model_pic->file as $file){
                        $picture = new Files();
                        $picture->name = $file->baseName . '.' . $file->extension;
                        $picture->address_big_picture = '/img/big/' . $picture->name;
                        $picture->address_small_picture = '/img/small/' . $picture->name;
                        $picture->tasks_id = $model->id_task;
                        $picture->save();
                    }
                    Yii::$app->cache->flush();
                    return $this->redirect(['view', 'id' => $model->id_task]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'model_pic' => $model_pic,
            'items' => $items
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_pic = $this->findFiles($model->id_task);
        $items = ArrayHelper::map(Performer::find()->all(),'index','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->cache->flush();
            return $this->redirect(['view', 'id' => $model->id_task]);
        }

        return $this->render('update', [
            'model' => $model,
            'model_pic' => $model_pic,
            'items' => $items,
        ]);
    }

    /**
     * Deletes an existing Tasks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model_pic = $this->findFiles($model->id_task);
        foreach ($model_pic as $file)
        {
            $file->delete();
        }
        $model->delete();
        Yii::$app->cache->flush();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Files model based on its id_task value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_task
     * @return Files the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findFiles($id_task)
    {
        if (($model_pic = Files::getDate($id_task)) !== null) {
            return $model_pic;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
