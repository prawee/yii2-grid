<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Xml */

$this->title = 'Create Xml';
$this->params['breadcrumbs'][] = ['label' => 'Xmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xml-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
