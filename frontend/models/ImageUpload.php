<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $img;

    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img'], 'file', 'extensions' => 'jpg, png']
        ];
    }

    public function uploadFile($file, $currentImage)
    {
        $this->img = $file;


        if (!empty($currentImage) && $currentImage != null && file_exists(Yii::getAlias('@web') . 'uploads/' . $currentImage)) {
            unlink(Yii::getAlias('@web') . 'uploads/' . $currentImage);
        }

        $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
        $this->img->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);

        return $filename;


    }
}
