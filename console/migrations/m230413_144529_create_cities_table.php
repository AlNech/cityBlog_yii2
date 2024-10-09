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
    public function up()
    {
         $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date_create' => $this->integer()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->batchInsert('cities', ['id', 'name', 'date_create'], [
                [1, 'Москва', 1683235829],
                [2, 'Ижевск', 1683235829],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('cities');
    }
}
