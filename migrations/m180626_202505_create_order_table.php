<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m180626_202505_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'address' => $this->string(150),
            'amount' => $this->float(),
            'qty' => $this->tinyInteger()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
