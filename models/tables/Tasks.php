<?php

namespace app\models\tables;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id_task
 * @property string $taskName
 * @property int $priority
 * @property string $dateCreate
 * @property string $dateDeadline
 * @property int $namePerformer
 * @property string $created_at
 * @property string $updated_at
 * @property string $bigImg
 * @property string $smallImg
 * @property Performer
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image;

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
            [['dateCreate', 'dateDeadline'], 'safe'],
            [['dateDeadline'], 'default', 'value' => function(){
                return $this->dateCreate;}],
            [['dateDeadline'], 'app\components\validators\DeadlineValidator'],
            [['taskName'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions' => 'jpg, png, gif']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_task' => 'ID Task',
            'taskName' => 'Task Name',
            'namePerformer' => 'Performer',
            'priority' => 'Priority',
            'dateCreate' => 'Date Create',
            'dateDeadline' => 'Date Deadline',
            'image' => 'Image',
        ];
    }

    static public function getDate($id){
        return Tasks::find()
            ->select(['tasks.*','performer.*','users.*'])
            ->from('tasks')
            ->join('LEFT OUTER JOIN','performer','performer.index = tasks.namePerformer')
            ->join('LEFT OUTER JOIN','users','users.id = performer.id_users')
            ->where('performer.id_users = :id_users')
            ->addParams([':id_users' => $id]);
    }

    public function uploadFile(){
        if ($this->validate()){
            $baseName = $this->image->getBaseName() . '.' . $this->image->getExtension();
            $fileName = '@webroot/img/big/' . $baseName;
            $this->image->saveAs(\Yii::getAlias($fileName),false);
            Image::thumbnail($fileName,100,100)
                ->save(\Yii::getAlias('@webroot/img/small/' . $baseName));
            return true;
        } else {
            return false;
        }
    }

    public function getPerformer(){
        return $this->hasOne(Performer::className(), ['index' => 'namePerformer']);
    }
}
