<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);

Modal::begin([
    'id' =>'content-modal',
    'header' => Icon::show('cog') . '<b>Downlink Station</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
?>

<div class="downlink-station-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('plus').' Create' : Icon::show('edit').' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('times-circle').'Close',['/downlink-station/index'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
Modal::end();