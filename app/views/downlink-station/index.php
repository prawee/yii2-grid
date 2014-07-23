<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

$this->title = 'Downlink Stations';

Modal::begin([
    'id' =>'content-modal',
    'header' => Icon::show('star') . '<b>Downlink Station</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
?>
<div class="downlink-station-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('plus').' Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState'=>false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'value',
            ['class' => 'prawee\grid\ActionColumn','options'=>['style'=>'width:100px;']],
        ],
    ]);
    ?>
    <?php Pjax::end()?>
    <?= Html::a(Icon::show('times-circle').'Close',['/setting/index'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
</div>
<?php
Modal::end();