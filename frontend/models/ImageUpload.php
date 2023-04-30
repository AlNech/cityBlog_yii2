<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class ImageUpload extends Model{
    public $image;

    public function rules()
    {
        return [
            [['image'] , 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png']
        ];
    }

    public function uploadFile($file, $currentImage)
    {
        if ($this->validate())
        {
            $this->image = $file;
            if(file_exists(Yii::getAlias('@web') . 'uploads/' . $currentImage))
            {
                unlink(Yii::getAlias('@web') . 'uploads/' . $currentImage);
            }

            $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

            $file->saveAs(Yii::getAlias('@web' . 'uploads/' . $filename));
            return $file->name;
        }

    }
}
