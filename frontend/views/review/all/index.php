<?php

use yii\bootstrap5\Popover;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\ReviewController $reviews */
/** @var \frontend\controllers\ReviewController $authors*/
$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($reviews as $review):?>
            <?php $author = $review->getUser($review["id_author"]);?>
            <div class="col-lg-4">
                <div class="title">
                    <h3><?=$review["title"]?></h3>

                    <span class="badge bg-secondary"><?=date('F j, Y',$review["date_create"])?></span>
                </div>
                <div class=""><?=$review["text"]?></div>


                <?php

                if (!Yii::$app->user->isGuest){
                    Popover::begin([
                        'title' => $author->username,
                        'toggleButton' => ['label' => $author->username],

                    ]);

                    echo $author->phone;
                    echo $author->email;
                    echo \yii\helpers\Html::a('View', ['author/', 'id' => $review["id"]],['class'=>'btn btn-primary']);
                    Popover::end();
                }

                ?>

                <?php foreach ($review->cities as $city):?>
                    <div class=""><?=$city["name"]?></div>
                <?php endforeach;?>

                <?= \yii\helpers\Html::a( 'Подробнее', ['review/one', 'id' => $review["id"]], ['class' => 'btn btn-success'])?>

                <div class=""><span>Оценка: </span><?=$review["rating"]?></div>
            <div>
            <?php endforeach;?>
        </div>
    </div>
</div>
