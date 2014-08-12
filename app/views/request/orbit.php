<?php
/*
 * 2014-07-31
 * konkeanweb@gmail.com
 */
use yii\helpers\Html;
use yii\bootstrap\Modal; 
use kartik\icons\Icon;
Icon::map($this);
use yii\grid\GridView;

$this->title = 'Orbit';
$this->params['breadcrumbs'][] = $this->title; 
 
Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('support') . '<b>Orbit</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="uss-orbit-index">
    <div class="row">
        <div class="col-xs-12">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns'=>[
                    ['class' => '\yii\grid\SerialColumn'],
                    [
                        'label'=>'Orbit Number',
                        'attribute'=>'orbit_cycle'
                    ],
                    'roll_max_access',
                    'earliest_date'
                ]
            ])
            ?>
            <?=
            Html::a(Icon::show('times') . 'Close', ['/request/index'], [
                'class' => 'btn btn-danger',
                'name' => 'assign-button',
            ]);
            ?>
        </div>
    </div>
</div>
<?php
Modal::end();