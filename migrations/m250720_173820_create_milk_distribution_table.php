<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%milk_distribution}}`.
 */
class m250720_173820_create_milk_distribution_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%milk_distribution}}', [
            'id' => $this->primaryKey(),
            'filled_by' => $this->string()->notNull(),
            'amount' => $this->integer()->notNull(),
            'cistern_number' => $this->string()->notNull(),
            'created_at' => $this->integer(),
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('{{%milk_distribution}}');
    }
}
