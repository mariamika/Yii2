<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $model_pic app\models\tables\Files */
/* @var $items */

$this->title = Yii::t('app','Create Tasks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_pic' => $model_pic,
        'items' => $items
    ]) ?>

</div>
