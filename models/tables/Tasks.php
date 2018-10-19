<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $taskName
 * @property string $performer
 * @property int $priority
 * @property string $dateCreate
 * @property string $dateDeadline
 */
class Tasks extends \yii\db\ActiveRecord
{
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
            [['taskName', 'performer', 'priority', 'dateCreate', 'dateDeadline'], 'required'],
            [['priority'], 'integer'],
            [['dateCreate', 'dateDeadline'], 'safe'],
            [['taskName', 'performer'], 'string', 'max' => 100],
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
            'performer' => 'Performer',
            'priority' => 'Priority',
            'dateCreate' => 'Date Create',
            'dateDeadline' => 'Date Deadline',
        ];
    }
}
