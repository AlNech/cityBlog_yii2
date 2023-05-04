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
        $authors = [];
        foreach ($reviews as $review){
            $author = User::find()->andWhere(['id'=>$review["id_author"]])->one();
            array_push($authors, $author);
        }



        return $this->render('all/index', ['reviews' => $reviews, 'authors' => $authors]);
    }
    public function actionOne($id)
    {
        $review = Reviews::findOne($id);


        return $this->render('all/one', ['review' => $review]);
    }

}