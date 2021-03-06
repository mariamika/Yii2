<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = Yii::t('app','Task number ') . $model->id_task;
if (!$hideBreadcrumbs){
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tasks'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="tasks-view">
    <div style="width: 100%; display: flex; justify-content: space-around; flex-wrap: wrap; align-items: center; align-content: center">
        <div style="margin: 20px; width: 400px">
            <a href="/myTask/task/card?id=<?= $model->id_task?>"><h3><?= Html::encode($this->title) ?></h3></a>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'taskName',
                    'priority',
                    'dateCreate',
                    'dateDeadline',
                    'performer.name:text:performer',
                ],
            ]) ?>
        </div>
    </div>
</div>
