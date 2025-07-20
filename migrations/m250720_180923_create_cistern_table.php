<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cistern}}`.
 */
class m250720_180923_create_cistern_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%cistern}}', [
            'id' => $this->primaryKey(),
            'cistern_number' => $this->integer()->notNull()->unique(),
            'current_amount' => $this->integer()->notNull()->defaultValue(0),
        ]);

        // Заполнить 5 цистерн
        for ($i = 1; $i <= 5; $i++) {
            $this->insert('{{%cistern}}', [
                'cistern_number' => $i,
                'current_amount' => 0,
            ]);
        }
    }

    public function safeDown()
    {
        $this->dropTable('{{%cistern}}');
    }
}
