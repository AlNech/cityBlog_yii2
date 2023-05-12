<?php

use yii\bootstrap5\Popover;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\ReviewController $review */
$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="body-content">
        <div class="col-md-12">
            <?php $author = $review->getUser($review["id_author"]); ?>
            <div class="col-md-5 ml-3">
                <div class="title"><h3><?= $review["title"] ?></h3></div>

                <div class="row">
                    <div class="date col"><span
                                class="badge bg-secondary"><?= date('F j, Y', $review["date_create"]) ?></span></div>


                    <!--Window with info about author for auth user-->
                    <div class="author-info col">
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            Popover::begin([
                                'title' => $author->fio,
                                'toggleButton' => ['label' => $author->username, 'class' => 'badge bg-secondary'],

                            ]);

                            echo $author->phone . '<br>';
                            echo $author->email . '<br>';
                            echo \yii\helpers\Html::a('View', ['author/', 'id' => $author->id], ['class' => 'btn btn-primary mt-2']);
                            Popover::end();
                        }
                        ?>
                    </div>


                </div>


                <div class="img mt-3 mb-4">
                    <?php
                    if ($review["img"] != null) {
                        echo Html::img(Yii::getAlias('@web') . '/uploads/' . $review["img"],
                            [
                                'alt' => 'Изображение города',
                                'style' => 'height: 300px; width:500px'

                            ]);
                    }
                    ?>
                </div>

                <div class="text mt-2"><?= $review["text"] ?></div>


                <div class="mt-3 mb-3">
                    <?php foreach ($review->cities as $city): ?>
                        <?= $city["name"] . '  ' ?>
                    <?php endforeach; ?>
                </div>


                <div class="rating"><span>Оценка: </span><?= $review["rating"] ?></div>
            </div>
        </div>
    </div>
</div>