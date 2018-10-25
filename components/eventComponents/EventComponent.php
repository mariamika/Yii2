<?php
namespace app\components\eventComponents;
use app\components\notifications\TaskNotification;
use app\models\tables\Tasks;
use yii\base\Component;
use yii\base\Event;

class EventComponent extends Component
{
    public function init()
    {
        parent::init();

        Event::on(Tasks::className(),Tasks::EVENT_AFTER_INSERT,function (Event $event){
            TaskNotification::sendNotification($event->sender);
        });
    }


}