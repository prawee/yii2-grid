<?php
/*
 * 2014-06-25
 */
use yii\bootstrap\Modal;
use kartik\icons\Icon;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
//use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use auth\models\AuthItem;
//use yii\web\JsExpression;
//use yii\web\View;

Modal::begin([
    'id' =>'form-modal',
    'header' => Icon::show('cog') . '<b>Permission Management</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
$form = ActiveForm::begin([
    'id' => 'assign-form',
    'enableAjaxValidation' =>true,
    'enableClientValidation'=>true,
    'validateOnChange'=>false,
    /*'options'=>[
        'data-pjax'=>1
    ]*/
]);
?>
<?= $form->field($model,'type')->widget(Select2::classname(), [
    'data' => [
        "1" => "role",
        "2" => "permission"
    ],
    'options' => [
        'placeholder' => 'Select type RBAC item',
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ],
]);
?>
<?= $form->field($model,'parent')->widget(Select2::className(),[
    'data'=>  AuthItem::getItem(),
    'options'=>[
        'placeholder'=>'Select Parent'
    ],
    'pluginOptions' =>[
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ]
])?>
<?= $form->field($model,'name') ?>
<?= $form->field($model,'description')?>
<div class="form-group">
    <?= Html::submitButton(Icon::show('plus-circle').'Create',[
        'class'=>'btn btn-success'
    ])?>
    <?= Html::a(Icon::show('times-circle').'Cancel',['/auth/permission'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
</div>
<?php
ActiveForm::end();
Modal::end();