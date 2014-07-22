<?php
//use yii\helpers\Html;

$this->title ='Create Administrator';
?>
<div class="user-create">
    <?=
    $this->render('_form-admin', [
        'model' => $model,
    ])
    ?>

</div>
