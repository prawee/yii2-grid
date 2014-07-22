<?php
/*
 * 2014-07-16
 * prawee@hotmail.com
 */

use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\Select2;
use auth\models\AuthItem;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
use kartik\widgets\Alert;
Icon::map($this);

Modal::begin([
    'id' =>'form-modal',
    'header' => Icon::show('cog') . '<b>Relations Management</b>',
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
    'id' => 'relations-form',
]);
?>
<?php echo $form->field($model,'parent')->widget(Select2::className(),[
    //'data'=>  AuthItem::getItem(),
    'data'=>ArrayHelper::map(AuthItem::find()->asArray()->all(),'name','description'),
    'options'=>[
        'placeholder'=>'Select Parent'
    ],
    'pluginOptions' =>[
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ]
])?>
<?php echo $form->field($model,'child')->widget(Select2::className(),[
    //'data'=>  AuthItem::getItem(),
    'data'=>  ArrayHelper::map(AuthItem::find()->asArray()->all(),'name','description'),
    'options'=>[
        'placeholder'=>'Select Parent'
    ],
    'pluginOptions' =>[
        'allowClear' => true,
        'minimumResultsForSearch' => '-1',
    ]
])?>
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
