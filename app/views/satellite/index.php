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
<?php echo $this->render('_search-manual', ['model' => $searchModel]);   ?>
<div class="clearfix"></div>
<div class="grid-index " >
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
                            case '12': $d='Bangkok'; break;
                            case '17': $d='Miyun'; break;
                            case '20': $d='Kashi'; break;
                            case '21': $d='Sanya'; break;
                            case '30': $d='Wuhan'; break;
                            case '63': $d='Peru'; break;
                            case '64': $d='Japan'; break;
                            case '65': $d='Kiruna'; break;
                            case '66': $d='Canada'; break;
                            case '67': $d='Taiwan'; break;
                            case '68': $d='Indonesia'; break;
                            case '69': $d='Malaysia'; break;
                            case '70': $d='Russia1'; break;
                            default : $d='Rissia4'; break;
                        }
                        return $d;
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Number of Files',
                    'value'=>function($data){
                        switch($data->id){
                            case '12': $d=12; break;
                            case '17': $d=17; break;
                            case '20': $d=55; break;
                            case '21': $d=31; break;
                            case '30': $d=20; break;
                            case '63': $d=33; break;
                            case '64': $d=3; break;
                            case '65': $d=8; break;
                            case '66': $d=6; break;
                            case '67': $d=78; break;
                            case '68': $d=4; break;
                            case '69': $d=12; break;
                            case '70': $d=16; break;
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
                            case '12': $d=3; break;
                            case '17': $d=4; break;
                            case '20': $d=6; break;
                            case '21': $d=9; break;
                            case '30': $d=2; break;
                            case '63': $d=5; break;
                            case '64': $d=7; break;
                            case '65': $d=12; break;
                            case '66': $d=20; break;
                            case '67': $d=13; break;
                            case '68': $d=4; break;
                            case '69': $d=12; break;
                            case '70': $d=16; break;
                            default : $d=108; break;
                        }
                        return $d;
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Total Time(Secounds)',
                    'value'=>function($data){
                        switch($data->id){
                            case '12': $d=1245; break;
                            case '17': $d=1723; break;
                            case '20': $d=556; break;
                            case '21': $d=316; break;
                            case '30': $d=207; break;
                            case '63': $d=334; break;
                            case '64': $d=32; break;
                            case '65': $d=898; break;
                            case '66': $d=609; break;
                            case '67': $d=783; break;
                            case '68': $d=41; break;
                            case '69': $d=132; break;
                            case '70': $d=1676; break;
                            default : $d=1048; break;
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