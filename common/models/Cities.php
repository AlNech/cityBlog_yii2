<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $date_create
 */
class Cities extends \yii\db\ActiveRecord
{


    private $TOKEN = "cba7b8c2a30dc77de83849fa60076abb5e8bcafd";
    private $SECRET = "0b1b44050176785fe58567edb230438497102638";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create'],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_create'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['name'], 'checkCityAPI'],
        ];
    }

    //Validate city existed with API - service dadata
    public function checkCityAPI($attribute)
    {
        $dadata = new \Dadata\DadataClient($this->TOKEN, $this->SECRET);

        $url = $dadata->clean("address", $this->name);
        if (isset($this->name)) {
            if ($url["result"] != null) {
                return true;
            } else {
                $this->addError($attribute, "This city doesn't exist");
            }
        }
    }

    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['id' => 'review_id'])
            ->viaTable('review_city', ['city_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
        ];
    }
}
