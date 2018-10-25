<?php

use yii\db\Migration;

/**
 * Class m181025_173827_alter_users_table
 */
class m181025_173827_alter_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','created_at','datetime');
        $this->addColumn('users','updated_at','datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users','created_at');
        $this->dropColumn('users','updated_at');
    }
}
