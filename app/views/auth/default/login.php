<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use yii\bootstrap\ActiveForm;

Icon::map($this);


/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">  
    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n{beginWrapper}\n{input}\n{endWrapper}",
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-3',
                            'offset' => 'col-sm-offset-2',
                            'wrapper' => 'col-sm-5',
                            'error' => '',
                            'hint' => ''
                        ]
                    ]
                ])
        ?>
        <div class="col-lg-4 col-lg-offset-2">
            <div class="login-title">THEOS Programming Tools-2</div>


            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?php //$form->field($model, 'rememberMe')->checkbox() ?>  
            <div style="padding-left:100px;">
                <?= Html::submitButton(Icon::show('sign-in') . ' Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        </div>
        <div class="col-sm-5">
            <?= $form->errorSummary($model) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>