<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dependency app\controllers\TaskController */

$this->title = Yii::t('app','Tasks');?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Create Tasks'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if ($this->beginCache('task_',['duration' => 5, 'dependency' => $dependency])){

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id_task',
                'label' => Yii::t('app','ID Task'),
                'value' => 'id_task'],
            ['attribute' => 'taskName',
                'label' => Yii::t('app','Task Name'),
                'value' => 'taskName'],
            ['attribute' => 'priority',
                'label' => Yii::t('app','Priority'),
                'value' => 'priority'],
            ['attribute' => 'dateCreate',
                'label' => Yii::t('app','Date Create'),
                'value' => 'dateCreate'],
            ['attribute' => 'dateDeadline',
                'label' => Yii::t('app','Date Deadline'),
                'value' => 'dateDeadline'],
            ['attribute' => 'performer',
                 'label' => Yii::t('app','Performer'),
                 'value' => 'performer.name'],
            ['attribute' => 'smallImg',
                 'label' => Yii::t('app','Image'),
                 'format' => 'raw',
                 'value' => function ($data){
                    return Html::img(Url::to($data->smallImg),[
                            'alt' => 'yii2 - picture in GridView',
                            'style' => 'width:100px;',
                    ]);
                 }],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    $this->endCache();}?>
</div>
