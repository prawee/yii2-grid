<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);
use app\models\User;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;


$id=Yii::$app->getRequest()->get('id');
$type=Yii::$app->getRequest()->get('type');
Modal::begin([
    'id' =>'form-modal',
    'header' => Icon::show('cog') . '<b>Import XML</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
?>
<div class="xml-form">

    <?php
    $form = ActiveForm::begin([
        'validateOnType'=>true,
        'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>
    <?php //$form->errorSummary($model); ?>
    <?= $form->field($model, 'name')->fileInput() ?>
    <?php
    $distributorList= ArrayHelper::map(User::find()->where(['role'=>88])->asArray()->all(),'id','username');
    ?>
    <?= $form->field($model,'distributor_id')->dropDownList($distributorList,array('prompt'=>'','id'=>'distributor-id'))?>
    
    <?php
    echo $form->field($model, 'client_id')->widget(DepDrop::classname(), [
        'options' => ['id' => 'client-id'],
        'pluginOptions' => [
            'depends' => ['distributor-id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/xml/client'])
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('plus').' Create' : Icon::show('edit').' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('times-circle').'Close',['/xml/index','id'=>$id,'type'=>$type],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
Modal::end();