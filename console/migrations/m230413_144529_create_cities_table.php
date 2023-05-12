<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cities}}`.
 */
class m230413_144529_create_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique(),
            'date_create' => $this->integer()
        ]);

        $this->batchInsert('cities', ['id', 'name', 'date_create'], [
                [1, 'Москва', 1683235829],
                [2, 'Санкт-Петербург', 1683235829],
                [3, 'Ижевск', 1683235829],
                [4, 'Самара', 1683235829],
                [5, 'Саратов', 1683235829],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cities}}');
    }
}
