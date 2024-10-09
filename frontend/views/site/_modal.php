<?php

use common\models\Cities;
use yii\bootstrap5\Modal;
use \yii\helpers\Html;

/** @var common\models\Cities $cities */
/** @var \frontend\controllers\SiteController $location */
?>
<script type="text/javascript">
    $(window).on('load', function () {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
        })


        myModal.show();
    });


</script>

<div class="body-content col-md-12">
    <!-- Модальное окно -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Добро пожаловать!</h5>
                </div>
                <div class="modal-body">
                    <p><?= $location ?> ваш город?</p>
                </div>
                <div class="modal-footer">
                    <?php
                    $city = Cities::find()->where(['name' => $location])->one();
                    echo Html::a('Да', ['review/', 'id' => $city->id], ['class' => 'btn btn-primary']) ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                </div>
            </div>
        </div>
    </div>

</div>


