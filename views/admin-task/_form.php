<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'taskName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->dropDownList([
            '1' => 'Высокий приоритет',
            '2' => 'Средний приоритет',
            '3' => 'Низкий приоритет',
            '4' => 'Необязательно к исполнению'],
        ['prompt' => '-Choose a Priority-']) ?>

    <?= $form->field($model, 'dateCreate')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'dateDeadline')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'namePerformer')->dropDownList($items, ['prompt' => '-Choose a Performer-']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
