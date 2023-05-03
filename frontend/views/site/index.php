<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
            <?php foreach ($cities as $city):?>

            <div class="col-lg-4">
                <?= \yii\helpers\Html::a( $city->name, ['review/', 'id' => 1], ['class' => 'btn btn-danger'])?>
            <div>
            <?php endforeach;?>


        </div>

    </div>
</div>
