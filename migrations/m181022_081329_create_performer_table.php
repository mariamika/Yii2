<?php

use yii\db\Migration;

/**
 * Handles the creation of table `performer`.
 */
class m181022_081329_create_performer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('performer', [
            'index' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('performer');
    }
}
