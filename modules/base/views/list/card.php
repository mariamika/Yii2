<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

\app\assets\MyAsset::register($this);

$this->title = Yii::t('app','Task number ') . $model->id_task;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','List Tasks'), 'url' => ['/base']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_task',
            'taskName',
            'priority',
            'dateCreate',
            'dateDeadline',
            'performer.name:text:performer',
        ],
    ]) ?>
    <button class="my-btn">Нажми меня!</button>
</div>
