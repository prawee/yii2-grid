<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\icons\Icon;
use kartik\grid\GridView;
use yii\widgets\Pjax;

Icon::map($this);

//use app\models\SplittedStripLocal;
//use app\models\MissionLocal;

$this->title = 'CUF';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-index " >
    <p>
        <?= Html::a(Icon::show('plus').' Upload CUF File', ['#'], ['class' => 'btn btn-success']) ?>
    </p>

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
                    'label'=>'XML Name',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Request Name',
                    'value'=>function($data){return $data->RequestName;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Strip',
                    'value'=>function($data){return $data->StripName;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Status',
                    'value'=>function($data){return null;},
                ],   
                [
                    'attribute'=>'id',
                    'label'=>'Begin Reception Date',
                    'value'=>function($data){return null;},
                ],  
                [
                    'attribute'=>'id',
                    'label'=>'Revolution',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=30217; break;
                            case '21': $d=30217; break;
                            case '20': $d=30217; break;
                            case '17': $d=30217; break;
                            default : $d=30217; break;
                        }
                        return $d;
                    },
                ],  
                [
                    'attribute'=>'id',
                    'label'=>'File Name',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=31; break;
                            case '21': $d=32; break;
                            case '20': $d=33; break;
                            case '17': $d=34; break;
                            default : $d=36; break;
                        }
                        return $d;
                    },
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'Number of Scene',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=3; break;
                            case '21': $d=5; break;
                            case '20': $d=7; break;
                            case '17': $d=8; break;
                            default : $d=9; break;
                        }
                        return $d;
                    },
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'Sun Elevation',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=28.70; break;
                            case '21': $d=29.10; break;
                            case '20': $d=29.77; break;
                            case '17': $d=28.57; break;
                            default : $d=27.55; break;
                        }
                        return $d;
                    },
                ], 
                [
                    'attribute'=>'id',
                    'label'=>'Sun Azimuth',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=37.01; break;
                            case '21': $d=37.08; break;
                            case '20': $d=36.70; break;
                            case '17': $d=36.47; break;
                            default : $d=36.20; break;
                        }
                        return $d;
                    },
                ],[
                    'attribute'=>'id',
                    'label'=>'Quick Look',
                    'format'=>'raw',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d='11102654101001.JPG'; break;
                            case '21': $d='11102654101002.JPG'; break;
                            case '20': $d='11102654101003.JPG'; break;
                            case '17': $d='11102654101004.JPG'; break;
                            default : $d='11102654101005.JPG'; break;
                        }
                        return Html::img('http://mvos3.gistda.or.th/tpt/uploads/cuf/'.$d,[
                            'style'=>'width:30px;'
                        ]);
                    },
                ],
                [
                    'class'=>'prawee\grid\ActionColumn',
                    'template'=>'{import} {export}',
                    'options'=>['class'=>'width-action'],
                    'header'=>'Import | Export',
                    'buttons'=>[
                        'export' => function($data) {
                            return Html::a(Icon::show('upload'),'#',[
                                'data-pjax'=>'0',
                                'title'=>' Export ',
                                'class'=>'btn btn-xs btn-danger',
                            ]);
                        },
                        'import' => function($url,$model) {
                            return Html::a(Icon::show('download'),'#',[
                                'data-pjax'=>'0',
                                'title'=>' Import ',
                                'class'=>'btn btn-xs btn-success',
                            ]);
                        }
                    ]
                ]
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>