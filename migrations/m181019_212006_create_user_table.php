<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181019_212006_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'password' => $this->string(100),
            'authKey' => $this->string(150),
            'accessToken' => $this->string(150)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
