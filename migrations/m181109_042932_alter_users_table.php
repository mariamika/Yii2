<?php

use yii\db\Migration;

/**
 * Class m181109_042932_alter_users_table
 */
class m181109_042932_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','role_id','integer');
        $this->addForeignKey('fk_users_role','users','role_id','role','id_role');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_users_role','users');
        $this->dropColumn('users','role_id');
    }
}
