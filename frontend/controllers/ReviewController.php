<?php

namespace frontend\controllers;

use common\models\Reviews;
use Yii;
use yii\web\Controller;

class ReviewController extends Controller
{
    public function actionIndex()
    {
        $reviews = Reviews::find()->all();
        return $this->render('all/index', ['reviews' => $reviews]);
    }
}