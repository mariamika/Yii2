<?php

use yii\db\Migration;

/**
 * Class m181025_203939_alter_performer_table
 */
class m181025_203939_alter_performer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('performer','email','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('performer','email');
    }
}
