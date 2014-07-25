<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\icons\Icon;
use kartik\grid\GridView;
use yii\widgets\Pjax;

Icon::map($this);

use app\models\SplittedStripLocal;
use app\models\MissionLocal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\USSWoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Analysis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-index " >

    <?php //echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="scrollspy-board" data-spy="scroll" data-offset="0">
        <?php
        Pjax::begin([
            'id' => 'Pjax',
            'enablePushState' => false
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii\grid\SerialColumn'],
                //
                [
                    'attribute'=>'id',
                    'label'=>'plandatestart',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'requestname',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'strip',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'orbit',
                    'value'=>function($data){return null;},
                ],   
                [
                    'attribute'=>'id',
                    'label'=>'panfile',
                    'value'=>function($data){return null;},
                ],  
                [
                    'attribute'=>'id',
                    'label'=>'msfile',
                    'value'=>function($data){return null;},
                ],  
                [
                    'attribute'=>'id',
                    'label'=>'revno',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'downlinkstation',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'pan',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'b1',
                    'value'=>function($data){return null;},
                ],[
                    'attribute'=>'id',
                    'label'=>'b2',
                    'value'=>function($data){return null;},
                ],[
                    'attribute'=>'id',
                    'label'=>'b3',
                    'value'=>function($data){return null;},
                ],[
                    'attribute'=>'id',
                    'label'=>'b4',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'compratio',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'rollmax',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'pitch',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'luminosity',
                    'value'=>function($data){return null;},
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'cloudcoverage',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'cufstatus',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'remark',
                    'value'=>function($data){return null;},
                ],
                [
                    'class' => 'prawee\grid\ActionColumn',
                    'template' => '{shape}  {export}  {info}  {import}',
                    'buttons' => [
                        'shape' => function($data) {
                    return Html::a(Icon::show('file-zip-o'), '#', [
                                'data-pjax' => '0',
                                'title' => ' Shape ',
                                'class' => 'btn btn-xs btn-danger',
                    ]);
                },
                        'export' => function($data) {
                    return Html::a(Icon::show('upload'), '#', [
                                'data-pjax' => '0',
                                'title' => ' Export ',
                                'class' => 'btn btn-xs btn-danger',
                    ]);
                },
                        'info' => function($url, $model) {
                    return Html::a(Icon::show('info'), $url, [
                                'data-pjax' => '0',
                                'title' => ' Info ',
                                'class' => 'btn btn-xs btn-info',
                    ]);
                },
                        'import' => function($url, $model) {
                    return Html::a(Icon::show('download'), ['/xml/index', 'id' => $model->id], [
                                'data-pjax' => '0',
                                'title' => ' Import ',
                                'class' => 'btn btn-xs btn-success',
                    ]);
                }
                    ]
                ],
            ],
        ]);

        /*  echo GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'responsive' => true,
          'hover' => true,
          'columns' => [
          ['class' => '\kartik\grid\SerialColumn'],
          ['class' => '\kartik\grid\CheckboxColumn'],
          'wo_doc_name',
          'aoi_name',
          //['class'=>'prawee\grid\ActionColumn'],
          [
          'class' => '\kartik\grid\ActionColumn',
          'deleteOptions' => ['label' => Icon::show('times')]
          ]
          ]
          ]); */
        Pjax::end();
        ?>
    </div>
</div>