<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%milk_distribution}}`.
 */
class m250720_181015_create_milk_distribution_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%milk_distribution}}', [
            'id' => $this->primaryKey(),
            'filled_by' => $this->string()->notNull(),
            'amount' => $this->integer()->notNull(),
            'cistern_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-milk_distribution-cistern_id',
            '{{%milk_distribution}}',
            'cistern_id',
            '{{%cistern}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-milk_distribution-cistern_id', '{{%milk_distribution}}');
        $this->dropTable('{{%milk_distribution}}');
    }
}
