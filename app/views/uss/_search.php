<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\USSWoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usswo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'aoi_id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'order_doc_no') ?>

    <?= $form->field($model, 'order_doc_year') ?>

    <?php // echo $form->field($model, 'order_doc_prefix') ?>

    <?php // echo $form->field($model, 'order_status') ?>

    <?php // echo $form->field($model, 'aoi_name') ?>

    <?php // echo $form->field($model, 'satellite_id') ?>

    <?php // echo $form->field($model, 'acq_date_start') ?>

    <?php // echo $form->field($model, 'acq_date_end') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'attr_ta') ?>

    <?php // echo $form->field($model, 'attr_tl') ?>

    <?php // echo $form->field($model, 'attr_s') ?>

    <?php // echo $form->field($model, 'attr_pt') ?>

    <?php // echo $form->field($model, 'attr_ct') ?>

    <?php // echo $form->field($model, 'attr_ta_id') ?>

    <?php // echo $form->field($model, 'attr_tl_id') ?>

    <?php // echo $form->field($model, 'attr_s_id') ?>

    <?php // echo $form->field($model, 'attr_pt_id') ?>

    <?php // echo $form->field($model, 'attr_ct_id') ?>

    <?php // echo $form->field($model, 'is_ortho') ?>

    <?php // echo $form->field($model, 'is_rush') ?>

    <?php // echo $form->field($model, 'is_dem') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'modified') ?>

    <?php // echo $form->field($model, 'wo_doc_name') ?>

    <?php // echo $form->field($model, 'wo_doc_year') ?>

    <?php // echo $form->field($model, 'wo_doc_no') ?>

    <?php // echo $form->field($model, 'wo_created') ?>

    <?php // echo $form->field($model, 'wo_modified') ?>

    <?php // echo $form->field($model, 'tpt_status') ?>

    <?php // echo $form->field($model, 'tpt_user_id') ?>

    <?php // echo $form->field($model, 'tpt_user_name') ?>

    <?php // echo $form->field($model, 'customer_id') ?>

    <?php // echo $form->field($model, 'customer_name') ?>

    <?php // echo $form->field($model, 'customer_name_th') ?>

    <?php // echo $form->field($model, 'project_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
