<?php
namespace app\models;

use app\models\tables\Users;
use yii\base\Model;

class Registration extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            [['username'], 'unique', 'targetClass' => Users::className(),  'message' => 'Этот логин уже занят'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'username' => 'Логин',
          'password' => 'Пароль'
        ];
    }

}