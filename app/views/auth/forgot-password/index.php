<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title='Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin([
            'id' => 'forgot-password-form',
            'enableAjaxValidation'=>false,
            'validateOnType'=>false,
        ]); ?>
        <?= $form->field($model, 'email') ?>
        <div class="form-group">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'forgot-password-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


