<?php

use yii\db\Migration;

/**
 * Class m181022_085540_alter_tasks_table
 */
class m181022_085540_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('tasks','performer');
        $this->addColumn('tasks','namePerformer','integer');
        $this->addForeignKey('fk_tasks_performer','tasks','namePerformer','performer','index');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tasks_performer','tasks');
        $this->dropColumn('tasks','namePerformer');
        $this->addColumn('tasks','performer','string');
    }
}
