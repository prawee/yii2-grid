<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="plan-local-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'class'=>'well-sm'
    ]); ?>

    <?php //$form->field($model, 'id') ?>

    <?php //$form->field($model, 'name') ?>

    <?php //$form->field($model, 'databasedata_id') ?>

    <?= $form->field($model, 'start_date') ?>

    <?php //$form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'plan_status_id') ?>

    <?php // echo $form->field($model, 'attr_version') ?>

    <?php // echo $form->field($model, 'attr_image') ?>

    <?php // echo $form->field($model, 'attr_key') ?>

    <?php // echo $form->field($model, 'attr_status') ?>

    <?php // echo $form->field($model, 'attr_type') ?>

    <?php // echo $form->field($model, 'attr_lock') ?>

    <!--<div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>-->

    <?php ActiveForm::end(); ?>

</div>
