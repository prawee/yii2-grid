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
    

    <?php //echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="scrollspy-board" data-spy="scroll" data-offset="0">
        <?php
        Pjax::begin([
            'id' => 'Pjax',
            'enablePushState' => false
        ]);
        //echo '<pre>'.print_r($dataProvider,true).'</pre>';
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii\grid\SerialColumn'],
                //
                [
                    'attribute'=>'id',
                    'label'=>'Downlink station',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d='Bangkok'; break;
                            case '21': $d='Russia1'; break;
                            case '20': $d='Sanya'; break;
                            case '17': $d='Japan'; break;
                            default : $d='Miyun'; break;
                        }
                        return $d;
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Number of Files',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=55; break;
                            case '21': $d=31; break;
                            case '20': $d=20; break;
                            case '17': $d=17; break;
                            default : $d=108; break;
                        }
                        return $d;
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Number of Scenes',
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
                    'label'=>'Total Time(Secounds)',
                    'value'=>function($data){
                        switch($data->id){
                            case '30': $d=1230; break;
                            case '21': $d=5550; break;
                            case '20': $d=3321; break;
                            case '17': $d=8831; break;
                            default : $d=10211; break;
                        }
                        return $d;
                    },
                ],   
                [
                    'attribute'=>'id',
                    'label'=>'Generate Report',
                    'value'=>function($data){return null;},
                ],  
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>