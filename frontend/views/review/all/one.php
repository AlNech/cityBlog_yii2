<?php

use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\ReviewController $review */
$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <?php echo $review->title?>
            </div>
        </div>
    </div>
</div>