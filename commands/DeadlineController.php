<?php
namespace app\commands;

use app\components\notifications\DeadlineNotification;
use yii\console\ExitCode;
use app\models\tables\Tasks;
use yii\console\Controller;

/**
 * Team to check deadline tasks
 */

class DeadlineController extends Controller
{
    public function actionIndex(){

        $model = Tasks::find()
            ->joinWith(['performer'])
            ->select(['tasks.*','performer.*'])
            ->where('tasks.dateDeadline = date(now()) + 1')
            ->all();

        if (!$model){
            $message = 'Tasks with deadlines tomorrow - not found. Complete!!!';
            var_dump($message);
            return ExitCode::OK;
        } else {
            foreach ($model as $item)
            {
                DeadlineNotification::sendNotification($item);
            }
            var_dump('Complete!');
            return ExitCode::OK;
        }
    }
}