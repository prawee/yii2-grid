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
<div class="grid-index " >
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
                'id',
                [
                    'attribute'=>'id',
                    'label'=>'XML Name',
                    'value'=>function($url,$data){
                        switch($data->id){
                            case 4: $d='THA_AMNATCHA_20140803_URG_FL'; break;
                            case 6: $d='CEO_201407311432_565_PM_STD'; break;
                            case 7: $d='USA_L2_3_WC'; break;
                            default: $d=''; break;
                        }
                        return $d;
                    }
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Request Name',
                    'value'=>function($url,$data){
                        switch($data->id){
                            case 4: $d='THA_AMNATCHA_20140803_URG_FL'; break;
                            case 6: $d='CEO_201407311432_565_PM_STD'; break;
                            case 7: $d='USA_L2_3_WC'; break;
                            default: $d=''; break;
                        }
                        return $d;  
                    },
                ],
                [
                    'attribute'=>'id',
                    'label'=>'Strip',
                    'value'=>function($url,$data){
                        switch($data->id){
                            case 4: $d='Strip #1'; break;
                            case 6: $d='Strip #2'; break;
                            case 7: $d='Strip #1'; break;
                            default: $d=''; break;
                        }
                        return $d;
                        
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