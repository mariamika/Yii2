<?php

namespace app\models\tables;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "performer".
 *
 * @property int $index
 * @property string $name
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property Tasks[] $tasks
 */
class Performer extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','email'], 'required'],
            [['name','email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'index' => 'Index',
            'name' => 'Name',
            'email' => 'Email'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['namePerformer' => 'index']);
    }
}
