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
                <div class="title"><h3><?=$review->title?></h3></div>
                <div class="title"><h3><?=$review->text?></h3></div>
                <div class="title"><h3><?=$review->rating?></h3></div>
                <div class="title"><h3><?=$review->id_author->username?></h3></div>
                <div class="title"><h3><?=$review->date_create?></h3></div>
            <div>
            <?php endforeach;?>
        </div>
    </div>
</div>
