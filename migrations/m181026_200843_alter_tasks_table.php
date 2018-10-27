<?php

use yii\db\Migration;

/**
 * Class m181026_200843_alter_tasks_table
 */
class m181026_200843_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tasks','dateDeadline','date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('tasks','dateDeadline','date not null');
    }
}
