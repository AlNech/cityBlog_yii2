<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\ReviewController $reviews */
$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($reviews as $review):?>
            <div class="col-lg-4">
                <div class="title">
                    <h3><?=$review->title?></h3>
                    <span ><?=$review->author->username?></span>
                    <span ><?=date('F j, Y',$review->date_create)?></span>
                </div>
                <div class=""><?=$review->text?></div>

                <?php foreach ($review->cities as $city):?>
                    <div class=""><?=$city->name?></div>
                <?php endforeach;?>



                <div class=""><span>Оценка: </span><?=$review->rating?></div>
            <div>
            <?php endforeach;?>
        </div>
    </div>
</div>
