<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
//use kartik\grid\GridView;
use yii\widgets\Pjax;

Icon::map($this);
use app\models\MiseoGroupLocal;
use app\models\SplittedStripLocal;
use app\models\MissionLocal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\USSWoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Analysis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-index " >

    <?php //echo $this->render('_search', ['model' => $searchModel]);  ?>
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
                ['class' => '\yii\grid\CheckboxColumn'],
                'wo_doc_name',
                'aoi_name',
                [
                    'label'=>'Request Name',
                    'attribute'=>'id',
                    'value'=>function($data){   
                        return $data->RequestName;
                    }
                ],
                [
                    'label' => 'Strip Name',
                    'attribute' => 'id',
                    'value' => function($data) {
                        return $data->StripName;                       
                    }
                ],
                [
                    'label' => 'Rev No.',
                    'attribute' => 'id',
                    'value' => function($data) {return null;}
                ],
                [
                    'label' => 'Lastest Program Date',
                    'attribute' => 'id',
                    'value' => function($data) {return null;}
                ],
                [
                    'label' => 'Delivery Date',
                    'attribute' => 'id',
                    'value' => function($data) {return null;}
                ],
//                [
//                    'label' => 'Accessible Orbit',
//                    'attribute' => 'id',
//                    'value' => function($data) {return null;}
//                ],
                [
                    'label' => 'Deposit Date',
                    'attribute' => 'id',
                    'value' => function($data) {
                        return $data->DepositDate;
                    }
                ],
//                [
//                    'label' => 'Status',
//                    'attribute' => 'id',
//                    'value' => function($data) {return null;}
//                ],
                //'id',
                //'aoi_id',
                //'order_id',
                //'order_doc_no',
                //'order_doc_year',
                // 'order_doc_prefix',
                // 'order_status',
                // 'satellite_id',
                // 'acq_date_start',
                // 'acq_date_end',
                // 'quantity',
                // 'unit',
                // 'remark:ntext',
                // 'attr_ta',
                // 'attr_tl',
                // 'attr_s',
                // 'attr_pt',
                // 'attr_ct',
                // 'attr_ta_id',
                // 'attr_tl_id',
                // 'attr_s_id',
                // 'attr_pt_id',
                // 'attr_ct_id',
                // 'is_ortho',
                // 'is_rush',
                // 'is_dem',
                // 'created',
                // 'modified',
                // 'wo_doc_year',
                // 'wo_doc_no',
                // 'wo_created',
                // 'wo_modified',
                // 'tpt_status',
                // 'tpt_user_id',
                // 'tpt_user_name',
                // 'customer_id',
                // 'customer_name',
                // 'customer_name_th',
                // 'project_name',
                [
                    'class' => 'prawee\grid\ActionColumn',
                    'template' => '{shape}  {export}  {info} {orbit} {import}',
                    'header'=>'Shape|Export|Info|Orbit|Import',
                    'buttons' => [
                        'shape' => function($data) {
                            return Html::a(Icon::show('file-zip-o'),'#',[
                                'data-pjax'=>'0',
                                'title'=>' Shape ',
                                'class'=>'btn btn-xs btn-danger',
                            ]);
                        },
                        'export' => function($data) {
                            return Html::a(Icon::show('upload'),'#',[
                                'data-pjax'=>'0',
                                'title'=>' Export ',
                                'class'=>'btn btn-xs btn-danger',
                            ]);
                        },
                        'info' => function($url,$model) {
                            return Html::a(Icon::show('info'),$url,[
                                'data-pjax'=>'0',
                                'title'=>' Info ',
                                'class'=>'btn btn-xs btn-info',
                            ]);
                        },
                        'orbit' => function($url,$model) {
                            return Html::a(Icon::show('support'),$url,[
                                'data-pjax'=>'0',
                                'title'=>' Orbit ',
                                'class'=>'btn btn-xs btn-warning',
                            ]);
                        },
                        'import' => function($url,$model) {
                            return Html::a(Icon::show('download'),['/xml/index','id'=>$model->id],[
                                'data-pjax'=>'0',
                                'title'=>' Import ',
                                'class'=>'btn btn-xs btn-success',
                            ]);
                        }
                    ],
                    'options'=>['class'=>'width-action'],
                ],
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>