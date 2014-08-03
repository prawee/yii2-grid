<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlanLocal */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Plan Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-local-view">

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
            'name',
            'databasedata_id',
            'start_date',
            'end_date',
            'plan_status_id',
            'attr_version',
            'attr_image',
            'attr_key',
            'attr_status',
            'attr_type',
            'attr_lock',
        ],
    ]) ?>

</div>
