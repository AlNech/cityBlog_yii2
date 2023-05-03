<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review_city".
 *
 * @property int $id
 * @property int|null $review_id
 * @property int|null $city_id
 */
class ReviewCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_id', 'city_id'], 'integer'],
        ];
    }
    public function getCity()
    {
        return $this->hasOne(Cities::class, ['id' => 'city_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'review_id' => 'Review ID',
            'city_id' => 'City ID',
        ];
    }
}
