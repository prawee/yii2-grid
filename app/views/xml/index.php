<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

$this->title = 'Xmls';
//$this->params['breadcrumbs'][] = $this->title;
Modal::begin([
    'id' =>'content-modal',
    'header' => Icon::show('star') . '<b>XML Import</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);
?>
<div class="xml-index">
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
            //'path',
            'send_email:email',
            //'user_id',
            // 'scene_id',
            'status',
            [
                'class' => 'prawee\grid\ActionColumn',
                'template'=>'{import}',
                'buttons'=>[
                    'import' => function($url,$model) {
                        return Html::a(Icon::show('download'),'#',[
                            'data-pjax'=>'0',
                            'title'=>' Import ',
                            'class'=>'btn btn-xs btn-info',
                        ]);
                    }
                ]
            ],
            [
                'class' => 'prawee\grid\ActionColumn',
                'template'=>'{delete}',
            ],
        ],
    ]);
    ?>
    <?php Pjax::end()?>
    <?= Html::a(Icon::show('times-circle').'Close',['/uss/index'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
</div>
<?php
Modal::end();