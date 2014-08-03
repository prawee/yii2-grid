<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanLocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plan Locals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-local-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Plan Local', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'databasedata_id',
            'start_date',
            'end_date',
            // 'plan_status_id',
            // 'attr_version',
            // 'attr_image',
            // 'attr_key',
            // 'attr_status',
            // 'attr_type',
            // 'attr_lock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
