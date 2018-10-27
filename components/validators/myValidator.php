<?php
namespace app\components\validators;
use yii\validators\Validator;

class myValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        echo 'hrsjbs.'; var_dump($model);
        exit;

//        if (!in_array($model->$attribute, ['USA', 'Indonesia'])) {
//            $this->addError($model, $attribute, 'Страна должна быть либо "{country1}" либо "{country2}".',
//                ['country1' => 'USA', 'country2' => 'Indonesia']);
//        }
    }
}