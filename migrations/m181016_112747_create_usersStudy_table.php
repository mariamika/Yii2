<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181016_112747_create_usersStudy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usersStudy', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(100)->notNull(),
            'role' => $this->integer()->defaultValue(1)
        ]);

        $this->createIndex('ix_users_login','users','login',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
