<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

Icon::map($this);

$this->title = 'Login';

Modal::begin(['id' => 'form-modal','closeButton'=>null, 'header' => '<h2>'.Icon::show('user').'Login</h2>']);
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-12 center-block">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton(Icon::show('sign-in').' Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php Modal::end(); ?>

