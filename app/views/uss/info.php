<?php
/*
 * 2014-07-22
 * prawee@hotmail.com
 */

use yii\widgets\DetailView;
//use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);



$this->title = 'Source Items';
$this->params['breadcrumbs'][] = $this->title;


Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('cog') . '<b>Info</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="source-item-index">
    <div class="row">
        <div class="col-xs-6">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'aoi_id',
                    'order_id',
                    'order_doc_no',
                    'order_doc_year',
                    'order_doc_prefix',
                    'order_status',
                    'aoi_name',
                    'satellite_id',
                    'acq_date_start',
                    'acq_date_end',
                    'quantity',
                    'unit',
                    'remark:ntext',
                    'attr_ta',
                    'attr_tl',
                    'attr_s',
                    'attr_pt',
                    'attr_ct',
                    'attr_ta_id',
                    'attr_tl_id',
                    'attr_s_id',
                    'attr_pt_id',
                    'attr_ct_id',
                    'is_ortho',
                    'is_rush',
                    'is_dem',
                    'created',
                    'modified',
                    'wo_doc_name',
                    'wo_doc_year',
                    'wo_doc_no',
                    'wo_created',
                    'wo_modified',
                    'tpt_status',
                    'tpt_user_id',
                    'tpt_user_name',
                    'customer_id',
                    'customer_name',
                    'customer_name_th',
                    'project_name',
                ],
            ])
            ?>
        </div>
        <div class="col-xs-6"></div>
    </div>
</div>
<?php
Modal::end();
