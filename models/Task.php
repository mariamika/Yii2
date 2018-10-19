<?php
namespace app\models;
use yii\base\Model;

class Task extends Model
{
    public $country;
    public $token;

    public function rules()
    {
        return [
            [['country'], 'app\components\validators\myValidator'],
            [['token'], function ($attribute, $params, $validator) {
                if (!ctype_alnum($this->$attribute)) {
                    $this->addError($attribute, 'Маркер должен содержать буквы или цифры.');
                }
            }],
        ];
    }
}