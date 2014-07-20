<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\USSWo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usswo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'aoi_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'order_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'order_doc_no')->textInput() ?>

    <?= $form->field($model, 'order_doc_year')->textInput() ?>

    <?= $form->field($model, 'order_doc_prefix')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'order_status')->textInput() ?>

    <?= $form->field($model, 'aoi_name')->textInput(['maxlength' => 160]) ?>

    <?= $form->field($model, 'satellite_id')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($model, 'acq_date_start')->textInput() ?>

    <?= $form->field($model, 'acq_date_end')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'unit')->dropDownList([ 'SQKM' => 'SQKM', 'SCENE' => 'SCENE', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attr_ta')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'attr_tl')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'attr_s')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'attr_pt')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'attr_ct')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'attr_ta_id')->textInput() ?>

    <?= $form->field($model, 'attr_tl_id')->textInput() ?>

    <?= $form->field($model, 'attr_s_id')->textInput() ?>

    <?= $form->field($model, 'attr_pt_id')->textInput() ?>

    <?= $form->field($model, 'attr_ct_id')->textInput() ?>

    <?= $form->field($model, 'is_ortho')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_rush')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_dem')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'modified')->textInput() ?>

    <?= $form->field($model, 'wo_doc_name')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'wo_doc_year')->textInput() ?>

    <?= $form->field($model, 'wo_doc_no')->textInput() ?>

    <?= $form->field($model, 'wo_created')->textInput() ?>

    <?= $form->field($model, 'wo_modified')->textInput() ?>

    <?= $form->field($model, 'tpt_status')->textInput() ?>

    <?= $form->field($model, 'tpt_user_id')->textInput() ?>

    <?= $form->field($model, 'tpt_user_name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'customer_id')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'customer_name_th')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
