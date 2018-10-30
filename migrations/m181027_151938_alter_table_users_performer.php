<?php

use yii\db\Migration;

/**
 * Class m181027_151938_alter_table_users_performer
 */
class m181027_151938_alter_table_users_performer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('performer','id_users','integer');
        $this->addForeignKey('fk_performer_users','performer','id_users','users','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_performer_users','performer');
        $this->dropColumn('performer','id_users');
    }
}
