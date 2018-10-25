<?php

use yii\db\Migration;

/**
 * Class m181025_173756_alter_tasks_table
 */
class m181025_173756_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks','created_at','datetime');
        $this->addColumn('tasks','updated_at','datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tasks','created_at');
        $this->dropColumn('tasks','updated_at');
    }
}
