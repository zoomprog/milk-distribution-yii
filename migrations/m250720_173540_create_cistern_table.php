<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cistern}}`.
 */
class m250720_173540_create_cistern_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cistern}}', [
            'id' => $this->primaryKey(),
            'cistern_number' => $this->string()->notNull()->unique(),
            'current_amount' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%cistern}}');
    }
}
