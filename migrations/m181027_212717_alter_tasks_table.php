<?php

use yii\db\Migration;

/**
 * Class m181027_212717_alter_tasks_table
 */
class m181027_212717_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('tasks','id','id_task');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('tasks','id_task','id');
    }
}
