<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PlanLocal */

$this->title = 'Create Plan Local';
$this->params['breadcrumbs'][] = ['label' => 'Plan Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-local-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
