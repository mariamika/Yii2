<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181019_143942_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'taskName' => $this->string(100)->notNull(),
            'performer' => $this->string(100)->notNull(),
            'priority' => $this->integer()->notNull(),
            'dateCreate' => $this->date()->notNull(),
            'dateDeadline' => $this->date()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
