<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title='Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Modal::begin(['id' => 'signup-modal', 'header' => '<h2>Login</h2>'])?>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin([
            'id' => 'signup-form',
            'enableAjaxValidation'=>false,
            'validateOnType'=>false,
        ]); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php Modal::end(); ?>
