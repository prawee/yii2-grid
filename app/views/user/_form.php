<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use kartik\icons\Icon;

Icon::map($this);

use zhuravljov\widgets\DatePicker;

Modal::begin([
    'id' => 'form-modal',
    'header' => Icon::show('group') . '<b>Add Group</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="user-form">
    <div class="">
        <?php
        $form = ActiveForm::begin([
                    'layout' => 'horizontal',
        ]);
        ?>

        <?= $form->field($model, 'fullname')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'telephone')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'nation')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>


        <?=$form->field($model, 'expired_date')->widget(DatePicker::className(), [
            'options' => ['class' => 'form-control'],
            'clientOptions' => [
                'format' => 'yyyy-mm-dd',
                'language' => 'en',
                'autoclose' => true,
                'todayHighlight' => true,
            ],
            'clientEvents' => [],
        ]);
        ?>
        <div class="center-block" style="">
            <?= Html::submitButton($model->isNewRecord ? Icon::show('plus') . ' Create' : Icon::show('edit') . ' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Icon::show('times') . ' Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
Modal::end();
