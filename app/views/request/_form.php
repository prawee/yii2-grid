<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scene */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scene-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wo_doc_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'aoi_name')->textInput(['maxlength' => 128]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
