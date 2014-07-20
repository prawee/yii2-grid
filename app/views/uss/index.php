<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);


/* @var $this yii\web\View */
/* @var $searchModel app\models\USSWoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usswos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-index">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'wo_doc_name',
            'aoi_name',
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
                /*'template' => '{shape}  {export}  {info}  {import}',
                'buttons' => [
                    'shape' => function($data) {
                        return Html::a(Icon::show('file-zip-o'));
                    },
                    'export' => function($data) {
                        return Html::a(Icon::show('upload'));
                    },
                    'info' => function($data) {
                        return Html::a(Icon::show('info'));
                    },
                    'import'=>function($data){
                        return Html::a(Icon::show('download'));
                    }
                ]*/
            ],
        ],
    ]);
    ?>
    
    
    <?php
    
    ?>

</div>
