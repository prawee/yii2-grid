<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\USSWo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usswos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usswo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
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
    ]) ?>

</div>
