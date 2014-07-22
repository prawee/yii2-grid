<?php

//use yii\helpers\Html;

$this->title = 'Update Admin: ' . ' ' . $model->username;
?>
<div class="user-update">
    <?=
    $this->render('_form-admin', [
        'model' => $model,
    ])
    ?>

</div>
