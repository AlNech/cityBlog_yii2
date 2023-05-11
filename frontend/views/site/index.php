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
    if (isset($session['city'])){
            Yii::$app->response->redirect(['review/', 'id' => $session['city']['id_city']]);
    }
?>
<div class="site-index">

    <?php /* echo $this->context->renderPartial('_modal', array(
        'location'=>$location,
    ));*/?>



    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <?php foreach ($cities as $city):?>
                    <?= \yii\helpers\Html::a( $city->name, ['review/', 'id' => $city->id], ['class' => 'my-1 mx-1 btn btn-outline-secondary'])?>
                <?php endforeach;?>
            </div>


            <div class="col-md-6">
                <?php if(!Yii::$app->user->isGuest){
                    echo '<div class="d-flex justify-content-center align-content-center border border-secondary">';

                        $form = ActiveForm::begin();
                        echo '<div class="mt-4">';
                            echo $form->field($model, "name")->textInput(["maxlength" => true]);
                        echo '</div>';

                        echo '<div class="form-group mt-2 mb-4">';
                                echo Html::submitButton("Добавить город", ["class" => "btn btn-success"]);
                        echo '</div>';

                        ActiveForm::end();

                    echo '</div>';
                } ?>
            </div>
        </div>
    </div>
    <div class="body-content col-md-12">

        <div class="">
            <div class="col-md-12 d-flex flex-row justify-content-between">

            <div>



        </div>





    </div>
</div>
