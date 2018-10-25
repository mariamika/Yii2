<?php

use yii\db\Migration;

/**
 * Class m181025_162134_alter_user_table
 */
class m181025_162134_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('user','users');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('users','user');
    }
}
