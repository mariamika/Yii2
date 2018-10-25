<?php

use yii\db\Migration;

/**
 * Class m181025_173727_alter_performer_table
 */
class m181025_173727_alter_performer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('performer','created_at','datetime');
        $this->addColumn('performer','updated_at','datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('performer','created_at');
        $this->dropColumn('performer','updated_at');
    }
}
