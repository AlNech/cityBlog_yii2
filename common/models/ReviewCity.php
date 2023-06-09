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

    // GET city with id
    public function getCity()
    {
        return $this->hasOne(Cities::class, ['id' => 'city_id']);
    }

    // Find review without city
    public function getReviewNoCity()
    {
        $review_id = $this->find()->where(['city_id' => null])->all();
        $reviews = [];
        foreach ($review_id as $one) {
            array_push($reviews, Reviews::findOne($one['review_id']));
        }
        return $reviews;
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
