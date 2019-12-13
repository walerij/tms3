<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mess}}`.
 */
class m191203_140334_create_mess_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mess}}', [
            'id' => $this->primaryKey(),
            'from_id'=>$this->integer(),
            'to_id'=>$this->integer(),
            'datetime_mess'=>$this->datetime(),
            'message'=>$this->string(),
            'status'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mess}}');
    }
}
