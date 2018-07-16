<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stat_login`.
 */
class m180716_152815_create_stat_login_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('stat_login', [
            'id' => $this->primaryKey(),
            'login' => $this->string(30)->notNull(),
            'time' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('stat_login');
    }
}
