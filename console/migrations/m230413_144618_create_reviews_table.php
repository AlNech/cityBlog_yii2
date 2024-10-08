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
            'title' => $this->string(128),
            'text' => $this->text(),
            'rating' => $this->integer(),
            'img' => $this->string(),
            'id_author' => $this->integer(),
            'date_create' => $this->integer()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');


        $this->batchInsert('reviews', ['id', 'title', 'text', 'rating', 'img', 'id_author', 'date_create'], [
                [1, 'Cool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis diam ac turpis finibus aliquam. Nulla vel magna molestie, accumsan ipsum vitae, tristique purus. Praesent a nisl libero.', 5, null, 1, 1683235829],
                [2, 'Amazing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis diam ac turpis finibus aliquam. Nulla vel magna molestie, accumsan ipsum vitae, tristique purus. Praesent a nisl libero.', 4, '00d363615d36f98fdaa1c7572b14420b.jpg', 1, 1683235829],
                [3, 'Awesome', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis diam ac turpis finibus aliquam. Nulla vel magna molestie, accumsan ipsum vitae, tristique purus. Praesent a nisl libero.', 3, null, 1, 1683235829],
                [4, 'Good', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis diam ac turpis finibus aliquam. Nulla vel magna molestie, accumsan ipsum vitae, tristique purus. Praesent a nisl libero.', 2, null, 1, 1683235829],
                [5, 'Nice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis diam ac turpis finibus aliquam. Nulla vel magna molestie, accumsan ipsum vitae, tristique purus. Praesent a nisl libero.', 5, null, 1, 1683235829],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }
}
