<?php

use yii\bootstrap5\Popover;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\AuthorController $reviews */
$this->title = 'My Yii Application';
?>


<div class="container">
    <div class="row">
        <?php foreach ($reviews as $review): ?>
            <!--        Find author review-->
            <?php $author = $review->getUser($review["id_author"]); ?>
            <div class="col-md-5 ml-3">
                <div class="title"><h3><?= $review["title"] ?></h3></div>

                <div class="row">
                    <div class="date col">
                        <span class="badge bg-secondary"><?= date('F j, Y', $review["date_create"]) ?></span>
                    </div>
                </div>


                <div class="text mt-2"><?= $review["text"] ?></div>


                <div class="mt-3 mb-3">
                    <?php foreach ($review->cities as $city): ?>
                        <?= $city["name"] . '  ' ?>
                    <?php endforeach; ?>
                </div>


                <div class="button open-page-review">
                    <?= \yii\helpers\Html::a('Подробнее', ['review/one', 'id' => $review["id"]], ['class' => 'btn btn-success']) ?>
                </div>


                <div class="rating"><span>Оценка: </span><?= $review["rating"] ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>