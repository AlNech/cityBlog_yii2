<?php

namespace common\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $cities_arr
 * @property string|null $title
 * @property string|null $text
 * @property int|null $rating
 * @property string|null $img
 * @property int|null $id_author
 * @property int|null $date_create
 */
class Reviews extends \yii\db\ActiveRecord
{



    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_create'],
                ],
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'id_author',
                'updatedByAttribute' => 'id_author',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        //The value from tech task
        return [
            [['id_author', 'date_create'], 'integer'],
            [['rating'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 100],
            [['img'], 'string', 'max' => 255],
            [['cities_arr'], 'safe'],
        ];
    }
    public function getUrl()
    {
        return Yii::$app->urlManager->createUrl([ 'review/view',
            'id'=>$this->id,
            'title'=>$this->title]);
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cities_arr' => 'Cities',
            'title' => 'Title',
            'text' => 'Text',
            'rating' => 'Rating',
            'img' => 'Img',
            'id_author' => 'Id Author',
            'date_create' => 'Date Create',
        ];
    }
    public function getUser($id){
        $user = User::findOne($id);
        return $user;
    }

    public function saveImage($filename)
    {
        $this->img = $filename;
        $this->save(false);
    }
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'id_author']);
    }


    public function getCities()
    {
        return $this->hasMany(Cities::className(), ['id' => 'city_id'])
            ->viaTable('review_city', ['review_id' => 'id']);
    }
    /**
     * Список городов, закреплённых за отзывом.
     * @var array
     */
    public $cities_arr = [];

    /**
     * Устанавлиает тэги отзыва.
     * @param $city_id
     */
    public function setCities($city_id)
    {
        $this->cities_arr = (array) $city_id;
    }
    public function getCitiesString()
    {
        $arr = ArrayHelper::map($this->cities, 'id', 'name');
        return implode(', ', $arr);
    }
    /**
     * Возвращает массив идентификаторов городов.
     */
    public function getCitiesId()
    {
        return ArrayHelper::getColumn(
            $this->getCities()->all(), 'city_id'
        );
    }
    public function afterSave($insert, $changedAttributes)
    {
        ReviewCity::deleteAll(['review_id' => $this->id]);
        $values = [];
        foreach ($this->cities_arr as $id) {
            $values[] = [$this->id, $id];
        }
        self::getDb()->createCommand()
            ->batchInsert(ReviewCity::tableName(), ['review_id', 'city_id'], $values)->execute();

        parent::afterSave($insert, $changedAttributes);

    }

}
