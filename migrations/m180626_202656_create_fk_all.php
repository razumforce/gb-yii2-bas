<?php

use yii\db\Migration;

/**
 * Class m180626_202656_create_fk_all
 */
class m180626_202656_create_fk_all extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // connect order with user
        $this->addForeignKey(
            'order-user', // где есть поле-таблица с которой уст связь
            'order', // где есть поле для связи
            'user_id',
            'user',
            'id' // PK итоговое целевое поле для связи
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // delete connect order with user
        $this->dropForeignKey('order-user','order');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_202656_create_fk_all cannot be reverted.\n";

        return false;
    }
    */
}
