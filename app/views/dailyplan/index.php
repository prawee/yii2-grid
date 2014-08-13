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
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Request Name'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Strip'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Orbit'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'PAN File'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'MS File'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Rev No.'],
            ['attribute'=>'id','value'=>function($e){return null;},'header'=>'Downlink Station'],
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
