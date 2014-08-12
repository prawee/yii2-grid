<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\icons\Icon;
use kartik\grid\GridView;
use yii\widgets\Pjax;

Icon::map($this);

//use app\models\SplittedStripLocal;
use app\models\MissionLocal;

$this->title = 'Mail';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search-manual', ['model' => $searchModel]);   ?>
<div class="clearfix"></div>
<div class="usswo-index " >
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
                    'value'=>function($url,$data){
                        echo $data->id;
                        return null;
                    }
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Request Name',
                    'value'=>function($url,$data){
                        
                        return null;  
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Strip',
                    'value'=>function($url,$data){
                        return null;
                        
                    },
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