<?php

use common\models\Cities;
use yii\bootstrap5\Modal;
use \yii\helpers\Html;
/** @var common\models\Cities $cities */
/** @var \frontend\controllers\SiteController $location */
?>
<script type="text/javascript">

    $(window).on('load', function() {
        $('#close-button').onclick;
    });
</script>

<div class="body-content col-md-12">
    <?php

        Modal::begin([
            'title' => '<h2>Добро пожаловать!</h2>',
            'options' => ['id'=>'myModal'],
        ]);
        echo '<div class="choice-city">';
        echo $location;
        echo ' ваш город ?</div>';


        echo '<div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" id="close-button">No</button>
              </div>';

        Modal::end();

    ?>

</div>


