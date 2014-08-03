<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanLocal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-local-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'databasedata_id')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'plan_status_id')->textInput() ?>

    <?= $form->field($model, 'attr_version')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'attr_image')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'attr_key')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'attr_status')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'attr_type')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'attr_lock')->textInput(['maxlength' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
