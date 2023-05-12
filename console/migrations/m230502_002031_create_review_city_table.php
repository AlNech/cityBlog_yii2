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


        $this->batchInsert('review_city', ['id', 'review_id', 'city_id'], [
                [1, 1, 1],
                [2, 1, 2],
                [3, 2, 5],
                [4, 3, 3],
                [5, 4, 2],
                [6, 4, 4],
                [7, 3, 1],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review_city}}');
    }
}
