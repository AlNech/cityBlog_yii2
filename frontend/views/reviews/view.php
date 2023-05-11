<?php

use timurmelnikov\widgets\LoadingOverlayPjax;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\Reviews $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);



?>
<div class="reviews-view" id="p0">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>



            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>


    </p>



        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['attribute'=>'Cities', 'value'=>function($model){return $model->citiesstring;}],
                'title',
                'text:ntext',
                'rating',
                'img',
                ['attribute'=>'Author', 'value'=>function($model){return $model->author->username;}],
                ['attribute'=>'Date create', 'value'=>function($model){return date('F j, Y',$model->date_create);}],
            ],
        ]) ?>



</div>
