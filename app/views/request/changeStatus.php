<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);
use yii\helpers\ArrayHelper;
use app\models\RequestStatus;

Modal::begin([
    'id' =>'form-modal',
    'header' => Icon::show('refetch') . '<b>Change Status</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
?>
<div class="scene-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $items=  ArrayHelper::map(RequestStatus::find()->asArray()->all(),'id','name');
    echo $form->field($model,'pgz_request_status_id')->dropDownList($items);
    ?>
    
    <?=$form->field($model,'sendmail')->checkbox(['label'=>'Send email to distributor and client'])?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('plus').' Create' : Icon::show('edit').' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?=
        Html::a(Icon::show('times-circle') . 'Close', ['/request/index'], [
            'class' => 'btn btn-danger',
            'name' => 'assign-button',
        ])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
Modal::end();