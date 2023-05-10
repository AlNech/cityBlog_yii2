<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\SiteController $model */
/** @var \frontend\controllers\SiteController $location */
/** @var \frontend\controllers\SiteController $session */
$this->title = 'My Yii Application';
?>

<?php
    $now = time();
    if (isset($session['city'])){
        if ($now > $session['city']['lifetime']) {
            $session->remove('city');
        }
        else {
            Yii::$app->response->redirect(['review/', 'id' => $session['city']['id_city']]);
        }
    }

?>
<div class="site-index">

    <?php  echo $this->context->renderPartial('_modal', array(
        'location'=>$location,
    ));?>


    <div class="body-content col-md-12">

        <div class="">
            <div class="col-md-12 d-flex flex-row justify-content-between">
                        <?php foreach ($cities as $city):?>

                        <div class="col-md-12">
                            <?= \yii\helpers\Html::a( $city->name, ['review/', 'id' => $city->id], ['class' => 'btn btn-success'])?>
                        <div>
                        <?php endforeach;?>
            <div>

            <?php if(!Yii::$app->user->isGuest){
                    echo '<div class="col-md-6">';

                    $form = ActiveForm::begin();
    
                    echo $form->field($model, "name")->textInput(["maxlength" => true]);
    
                    echo '<div class="form-group">';

                    echo Html::submitButton("Добавить город", ["class" => "btn btn-success"]);
                    echo '</div>';

                    ActiveForm::end();
    
                    echo '</div>';
            } ?>

        </div>





    </div>
</div>
