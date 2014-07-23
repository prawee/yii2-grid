<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DownlinkStation */

$this->title = 'Update Downlink Station: ' . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Downlink Stations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="downlink-station-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
