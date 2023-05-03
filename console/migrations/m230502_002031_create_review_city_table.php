<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review_city}}`.
 */
class m230502_002031_create_review_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review_city}}', [
            'id' => $this->primaryKey(),
            'review_id' => $this->integer(),
            'city_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review_city}}');
    }
}
