<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dependency app\controllers\AdminTaskController */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if ($this->beginCache('task_',['duration' => 3600, 'dependency' => $dependency])){

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_task',
            'taskName',
            'priority',
            'dateCreate',
            'dateDeadline',
            ['attribute' => 'performer',
                 'label' => 'Performer',
                 'value' => 'performer.name'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    $this->endCache();}?>
</div>
