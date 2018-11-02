<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Performer */

$this->title = Yii::t('app','Update Performer: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Performers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->index]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>
<div class="performer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
