<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Cities;

/** @var yii\web\View $this */
/** @var common\models\Reviews $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'cities_arr')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Cities::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->radioList(['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5]) ?>


    <div class="form-group">

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
