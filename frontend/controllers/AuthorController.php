<?php

namespace frontend\controllers;

use common\models\Reviews;
use common\models\Cities;
use common\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;

class AuthorController extends Controller
{
    // Page with all reviews of one author
    public function actionIndex($id)
    {
        $user = User::findOne($id);
        $reviews = $user->reviews;

        return $this->render('all/index', ['reviews' => $reviews]);
    }
}