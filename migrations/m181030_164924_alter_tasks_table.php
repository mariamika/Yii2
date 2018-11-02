<?php

use yii\db\Migration;

/**
 * Class m181030_164924_alter_tasks_table
 */
class m181030_164924_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks','bigImg','string');
        $this->addColumn('tasks','smallImg','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181030_164924_alter_tasks_table cannot be reverted.\n";
        $this->dropColumn('tasks','bigImg');
        $this->dropColumn('tasks','smallImg');
        return false;
    }
}
