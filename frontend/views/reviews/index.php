<?php

use common\models\Reviews;
use timurmelnikov\widgets\LoadingOverlayPjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;

/** @var yii\web\View $this */
/** @var common\models\search\ReviewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \frontend\controllers\ReviewsController $model */
$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?php /*= Html::a('Create Reviews', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!-- Render create form -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


    <?php LoadingOverlayPjax::begin([
            'elementOverlay'=>'#reviews_grid',
            'fade'=>[600,300],
            'color'=> 'rgba(102, 255, 204, 0.2)',
            'fontawesome' => 'fas fa-cog fa-spin',
            'id' => 'reviews']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['id' => 'reviews_grid'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'title',
                'text:ntext',
                'rating',
                ['attribute' => 'Author', 'value' => function ($model) {
                    return $model->author->username;
                }],
                ['attribute' => 'Cities', 'value' => function ($model) {
                    return $model->citiesstring;
                }],
                ['attribute' => 'Date create', 'value' => function ($model) {
                    return date('F j, Y', $model->date_create);
                }],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'urlCreator' => function ($action, Reviews $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    <?php LoadingOverlayPjax::end(); ?>
</div>
