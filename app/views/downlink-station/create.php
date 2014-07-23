<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DownlinkStation */

$this->title = 'Create Downlink Station';
$this->params['breadcrumbs'][] = ['label' => 'Downlink Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="downlink-station-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
