<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\widgets\Pjax;

$this->title = 'Plan Locals';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_search-manual', ['model' => $searchModel]);  ?>
<div class="clearfix"></div>
<div class="grid-index">
    <div class="scrollspy-board" data-spy="scroll" data-offset="0">
    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?=
    GridView::widget([
        'id'=>'dailyplan-grid',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' => 'start_date',
                'header' => 'Plan Date Start',
            ],
            ['attribute'=>'id','value'=>function($data){
                switch($data->id){
                    case '30': $d='THA_SAKHONNAK_20140805_URG_FL'; break;
                    case '21': $d='THA_AMNATCHA_20140803_URG_FL'; break;
                    case '20': $d='THA_YASOTORN_20140802_URG_FL'; break;
                    case '17': $d='CEO_201407311432_565_PM_STD'; break;
                    default : $d='CEO_201407311437_566_PM_STD'; break;
                }
                return $d;
            },'header'=>'Request Name'],
            ['attribute'=>'id','value'=>function($data){
                switch($data->id){
                    case '30': $d='Strip #1'; break;
                    case '21': $d='Strip #3'; break;
                    case '20': $d='Strip #2'; break;
                    case '17': $d='Strip #1'; break;
                    default : $d='Strip #1'; break;
                }
                return $d;
            },'header'=>'Strip'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Orbit'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'PAN File'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'MS File'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Rev No.'],
            ['attribute'=>'id','value'=>function($e){return 'Bangkok';},'header'=>'Downlink Station'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'PAN'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'B1'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'B2'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'B3'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'B4'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Comp.Ratio'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Roll Max'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Pitch'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Luminosity'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Cloud Coverage'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'CUF Status'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Remark'],
            [
                'class' => 'prawee\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{shape} {export}',
                'buttons' => [
                    'shape' => function($data) {
                        $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_AMNATCHA_20140803_URG_FL-Strip_01.zip';
                        return Html::a(Icon::show('file-zip-o'),$urlFile, [
                                    'data-pjax' => '0',
                                    'title' => ' Shape ',
                                    'class' => 'btn btn-xs btn-danger',
                        ]);
                    },
                    'export' => function($data) {
                        $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_SAKHONNAK_20140805_URG_FL-01.xls';
                        return Html::a(Icon::show('upload'),$urlFile, [
                                    'data-pjax' => '0',
                                    'title' => ' Export ',
                                    'class' => 'btn btn-xs btn-danger',
                        ]);
                    },
                ],
                'options' => ['style' => 'width:70px;']
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
    </div>
</div>
