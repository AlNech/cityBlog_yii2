<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviews}}`.
 */
class m230413_144618_create_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer(),
            'title' => $this->string(128),
            'text' => $this->text(),
            'rating' => $this->integer(),
            'img' => $this->string(),
            'id_author' => $this->integer(),
            'date_create' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }
}
