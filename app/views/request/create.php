<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Scene */

$this->title = 'Create Scene';
$this->params['breadcrumbs'][] = ['label' => 'Scenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scene-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
