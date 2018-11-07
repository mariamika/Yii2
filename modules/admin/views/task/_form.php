<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $model_pic app\models\tables\Files */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'taskName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->dropDownList([
            '1' => 'Высокий приоритет',
            '2' => 'Средний приоритет',
            '3' => 'Низкий приоритет',
            '4' => 'Необязательно к исполнению'],
        ['prompt' => '-Choose a Priority-']) ?>

    <?= $form->field($model, 'dateCreate')->widget(
            \yii\jui\DatePicker::className(),
            ['dateFormat' => 'yyyy-MM-dd',
             'language' => 'ru'])
    ?>

    <?= $form->field($model, 'dateDeadline')->widget(
            \yii\jui\DatePicker::className(),
            ['dateFormat' => 'yyyy-MM-dd',
             'language' =>'ru'])
    ?>

    <?= $form->field($model, 'namePerformer')->dropDownList($items, ['prompt' => '-Choose a Performer-']) ?>

    <?php if (is_object($model_pic)){
        echo $form->field($model_pic, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
    } else {
        $uploadFiles = '';
        foreach ($model_pic as $item){
            $uploadFiles = $uploadFiles . $item->name . '<br>';
        }
        //TODO доделать загрузку файлов. Вынести ее в отдельный метод.
        //echo $form->field($files, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
        echo $uploadFiles ;
    }?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
