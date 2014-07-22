<?php

//use yii\helpers\Html;

$this->title = 'Update User: ' . ' ' . $model->username;
?>
<div class="user-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
