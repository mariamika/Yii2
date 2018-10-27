<?php
namespace app\components\validators;
use yii\validators\Validator;

class DeadlineValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        echo'<pre>'; var_dump($model,$attribute); exit;

    }
}