<?php
//use yii\helpers\Html;

$this->title ='Create User';
?>
<div class="user-create">
    <?=
    $this->render('_form-child', [
        'model' => $model,
    ])
    ?>

</div>
