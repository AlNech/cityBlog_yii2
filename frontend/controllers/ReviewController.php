<?php

namespace frontend\controllers;

use common\models\Reviews;
use common\models\Cities;
use common\models\User;
use PhpParser\Node\Expr\Cast\Object_;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;

class ReviewController extends Controller
{
    public function actionIndex($id)
    {
        $city = Cities::findOne($id);

        $reviews = $city->reviews;




        return $this->render('all/index', ['reviews' => $reviews]);
    }
    public function actionOne($id)
    {
        $review = Reviews::findOne($id);


        return $this->render('all/one', ['review' => $review]);
    }

}