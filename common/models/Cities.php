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
    private const TOKEN = "91e5d0766db64ab3054b502c8e0fac45f7f2fb27";
    private const SECRET = "0b1b44050176785fe58567edb230438497102638";

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

    // Validate city existence inputted at form in main page and backend with API - service dadata
    public function checkCityAPI($attribute)
    {
        //Create new object dadata
        $dadata = new \Dadata\DadataClient(self::TOKEN, self::SECRET);

        //Conduct to research by city existing
        $url = $dadata->clean("address", $this->name);

        //Condition checks existence name of city if exist then validate success, else message with error will appear
        if (isset($this->name)) {
            if ($url["result"] != null) {
                return true;
            } else {
                $this->addError($attribute, "This city doesn't exist");
            }
        }
    }

    // Get review with table review_city
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
