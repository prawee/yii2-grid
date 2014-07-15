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
//use auth\models\AuthItem;
//use yii\web\JsExpression;
//use yii\web\View;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Alert;

Modal::begin([
    'id' =>'form-modal',
    'header' => Icon::show('cog') . '<b>Permission Management</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);

/*
 * start flash
 */
if (Yii::$app->session->hasFlash('error-modal')):
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Delete!',
        'icon' => 'glyphicon glyphicon-remove-sign',
        'body' => Yii::$app->session->getFlash('error-modal'),
        'showSeparator' => true,
        'delay' => 8000
    ]);
endif;
if (Yii::$app->session->hasFlash('success-modal')):
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'Success!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => Yii::$app->session->getFlash('success-modal'),
        'showSeparator' => true,
        'delay' => 3000
    ]);
endif;
if (Yii::$app->session->hasFlash('info-modal')):
    echo Alert::widget([
        'type' => Alert::TYPE_INFO,
        'title' => 'Info!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => Yii::$app->session->getFlash('info-modal'),
        'showSeparator' => true,
        'delay' => 3000
    ]);
endif;
/*
 * end flash
 */


$form = ActiveForm::begin([
    'id' => 'assign-form',
    //'enableAjaxValidation' =>true,
    //'enableClientValidation'=>true,
    //'validateOnChange'=>false,
    /*'options'=>[
        'data-pjax'=>1
    ]*/
]);
?>
<?= $form->field($model,'type')->widget(Select2::classname(), [
    'data' => [
        "1" => "Role",
        "2" => "Permission"
    ],
    'options' => [
        'placeholder' => 'Select type RBAC item',
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ],
]);

echo $form->field($model,'parent')->widget(DepDrop::className(),[
    'data'=>null,
    'options'=>['placeholder'=>'Select Item'],
    'type'=>  DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['authitemform-type'],
        'url'=> Url::to(['/auth/permission/items']),
        'loadingText'=>'Loading item...',
    ]
]);
?>
<?php /*$form->field($model,'parent')->widget(Select2::className(),[
    'data'=>  AuthItem::getItem(),
    'options'=>[
        'placeholder'=>'Select Parent'
    ],
    'pluginOptions' =>[
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ]
])
 */
?>
<?= $form->field($model,'name') ?>
<?= $form->field($model,'description')?>

<?= Html::csrfMetaTags() ?> 
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