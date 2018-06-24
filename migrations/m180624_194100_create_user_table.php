<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180624_194100_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string(30)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'email' => $this->string(50),
            'fio' => $this->string(80),
            'description' => $this->text()
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
