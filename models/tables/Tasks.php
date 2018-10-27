<?php

namespace app\models\tables;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $taskName
 * @property int $priority
 * @property string $dateCreate
 * @property string $dateDeadline
 * @property int $namePerformer
 * @property string $created_at
 * @property string $updated_at
 * @property Performer
 */
class Tasks extends \yii\db\ActiveRecord
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
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['taskName', 'namePerformer', 'priority', 'dateCreate'], 'required'],
            [['priority', 'namePerformer'], 'integer'],
            [['dateCreate'], 'safe'],
            [['dateDeadline'], 'app\components\validators\DeadlineValidator'],
            [['taskName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taskName' => 'Task Name',
            'namePerformer' => 'Performer',
            'priority' => 'Priority',
            'dateCreate' => 'Date Create',
            'dateDeadline' => 'Date Deadline',
        ];
    }

    public function getPerformer(){
        return $this->hasOne(Performer::className(), ['index' => 'namePerformer']);
    }
}
