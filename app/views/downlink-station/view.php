<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this);

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\DownlinkStation */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Downlink Stations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('star') . '<b>Downlink Station</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ]
]);
?>
<div class="downlink-station-view">
    <p>
        <?= Html::a(Icon::show('th').' List', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Icon::show('edit').' Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Icon::show('times').' Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'value',
        ],
    ])
    ?>
    <?= Html::a(Icon::show('times-circle').'Close',['/downlink-station/index'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
</div>
<?php
Modal::end();
