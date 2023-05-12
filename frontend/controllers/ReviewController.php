<?php

namespace frontend\controllers;

use common\models\ReviewCity;
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
        // Condition check city at session if doesn't exist then create with timelife and choiced city -> id
        $session = Yii::$app->session;
        if (!isset($session['city'])) {
            $session['city'] = [
                'id_city' => $id,
                'lifetime' => time() + 10,
            ];
        }

        // Research review with city
        $city = Cities::findOne($id);
        $reviews = $city->reviews;

        // Research review without city and push this reviews to value $reviews
        $reviews_nocity = new ReviewCity;
        $nocity = $reviews_nocity->getReviewNoCity();
        foreach ($nocity as $one) {
            array_push($reviews, $one);
        }


        return $this->render('all/index', ['reviews' => $reviews, 'session' => $session]);
    }

    // Page with one review after clicked buttton "Подробнее"
    public function actionOne($id)
    {
        $review = Reviews::findOne($id);

        return $this->render('all/one', ['review' => $review]);
    }

}