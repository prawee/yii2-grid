<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\USSWo */

$this->title = 'Create Usswo';
$this->params['breadcrumbs'][] = ['label' => 'Usswos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
