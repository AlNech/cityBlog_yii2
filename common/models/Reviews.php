<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $id_city
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
            [['id_city',  'id_author', 'date_create'], 'integer'],
            [['rating'], 'in', 'range'=>[1,2,3,4,5]],
            [['text'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 100],
            [['img'], 'string', 'max' => 255],
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
            'id_city' => 'City',
            'title' => 'Title',
            'text' => 'Text',
            'rating' => 'Rating',
            'img' => 'Img',
            'id_author' => 'Id Author',
            'date_create' => 'Date Create',
        ];
    }


    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }
}
