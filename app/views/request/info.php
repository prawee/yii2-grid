<?php
/*
 * 2014-07-22
 * prawee@hotmail.com
 */

use yii\widgets\DetailView;
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\icons\Icon;

Icon::map($this);



$this->title = 'Infomation';
$this->params['breadcrumbs'][] = $this->title;


Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('info') . '<b>Infomation</b>',
    'options' => array('class' => 'info'),
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="source-item-index">
    <div class="row">
        <div class="col-xs-12">
            <b>USS</b>
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'aoi_name',
                    //'aoi_id',
                    //'order_id',
                    //'order_doc_no',
                    //'order_doc_year',
                    //'order_doc_prefix',
                    //'order_status',
                    //'satellite_id',
                    'acq_date_start',
                    'acq_date_end',
                    //'quantity',
                    //'unit',
                    'remark:ntext',
                    //'attr_ta',
                    ['attribute' => 'attr_tl', 'label' => 'Priority'],
                    ['attribute' => 'attr_s', 'label' => 'Sensor'],
                    //'attr_pt',
                    //'attr_ct',
                    //'attr_ta_id',
                    //'attr_tl_id',
                    //'attr_s_id',
                    //'attr_pt_id',
                    //'attr_ct_id',
                    //'is_ortho',
                    ['attribute' => 'is_rush', 'label' => 'Rush'],
                    //'is_dem',
                    //'created',
                    //'modified',
                    //'wo_doc_name',
                    //'wo_doc_year',
                    'wo_doc_no',
                    //'wo_created',
                    [
                        'attribute' => 'wo_modified',
                        'value' => substr($model->wo_modified, 0, 19),
                    ],
                //'tpt_status',
                //'tpt_user_id',
                //'tpt_user_name',
                //'customer_id',
                //'customer_name',
                //'customer_name_th',
                //'project_name',
                ],
            ])
            ?>
            <?php 
                $woattribute = $model->woattribute;
                //print_r($woattribute);
            ?>
            <?php if($woattribute){?>
            <b>WO Attribute</b>
            <table class="table table-striped table-bordered detail-view wo_attribute">
                <tbody>
                    <?php foreach($woattribute as $wo){
                        echo "<tr>";
                        echo "<th>".$wo->attr_name."</th>";
                        echo "<td>".$wo->attr_value."</td>";
                        echo "</tr>";
                    }?>
                </tbody>
            </table>
            <?php }?>
            <b>Customer Information:</b>
            <?php
            //print_r($model->customer);
            echo DetailView::widget([
                'model' => $model->customer,
                'attributes' => [
                    ['attribute' => 'cus_name_th', 'label' => 'Name(th)'],
                    ['attribute' => 'cus_name', 'label' => 'Name'],
                    ['attribute' => 'cus_email', 'label' => 'Email'],
                    ['attribute' => 'cus_department_th', 'label' => 'Department(th)'],
                    ['attribute' => 'cus_phone', 'label' => 'Phone'],
                    ['attribute' => 'cus_fax', 'label' => 'Fax'],
                    ['attribute' => 'cus_mobile', 'label' => 'Mobile'],
                ],
            ])
            ?>
            <?=
            Html::a(Icon::show('times') . 'Close', ['/request/index'], [
                'class' => 'btn btn-danger',
                'name' => 'assign-button',
            ]);
            ?>
        </div>
    </div>
</div>
<?php
Modal::end();
