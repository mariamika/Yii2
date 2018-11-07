<?php

use yii\db\Migration;

/**
 * Class m181104_134105_alter_tasks_table
 */
class m181104_134105_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('tasks','bigImg');
        $this->dropColumn('tasks','smallImg');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('tasks','bigImg','string');
        $this->addColumn('tasks','smallImg','string');
    }
}
