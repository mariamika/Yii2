<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = Yii::t('app','Task number ') . $model->id_task;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id_task], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id_task], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_task',
            'taskName',
            'priority',
            'dateCreate',
            'dateDeadline',
            'performer.name:text:performer',
            ['attribute' => 'bigImg',
                'label' => 'Image',
                'format' => 'raw',
                'value' => function ($data){
                    return Html::img(Url::to($data->bigImg),[
                        'alt' => 'yii2 - picture in GridView',
                        'style' => 'width:300px;',
                    ]);
                }],
        ],
    ]) ?>

</div>
