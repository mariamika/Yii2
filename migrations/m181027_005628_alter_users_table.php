<?php

use yii\db\Migration;

/**
 * Class m181027_005628_alter_users_table
 */
class m181027_005628_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('users_username_uindex','users','username',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('users_username_uindex','users');
    }
}
