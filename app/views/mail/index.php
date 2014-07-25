<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\icons\Icon;
use kartik\grid\GridView;
use yii\widgets\Pjax;

Icon::map($this);

//use app\models\SplittedStripLocal;
//use app\models\MissionLocal;

$this->title = 'Mail';
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
                    'label'=>'XML Name',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Request Name',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Strip',
                    'value'=>function($data){return null;},
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Status',
                    'value'=>function($data){return null;},
                ],   
                [
                    'attribute'=>'id',
                    'label'=>'User',
                    'value'=>function($data){return null;},
                ],  
                [
                    'attribute'=>'id',
                    'label'=>'Date Update',
                    'value'=>function($data){return null;},
                ],  
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>