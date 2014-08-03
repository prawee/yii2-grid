<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\widgets\Pjax;

$this->title = 'Plan Locals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-local-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('plus').'Upload New Plan', ['xmldailyplan/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState'=>false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'start_date',
                'header'=>'Plan Date Start',
            ],
            [
                'class' => 'prawee\grid\ActionColumn',
                'header'=>'Action',
                'template'=>'{shape} {export}',
                'buttons' => [
                    'shape' => function($data) {
                        return Html::a(Icon::show('file-zip-o'), '#', [
                                    'data-pjax' => '0',
                                    'title' => ' Shape ',
                                    'class' => 'btn btn-xs btn-danger',
                        ]);
                    },
                    'export' => function($data) {
                        return Html::a(Icon::show('upload'), '#', [
                                    'data-pjax' => '0',
                                    'title' => ' Export ',
                                    'class' => 'btn btn-xs btn-danger',
                        ]);
                    },
                ],
                'options'=>['style'=>'width:70px;']
            ],
        ],
    ]);
    ?>
    <?php Pjax::end();?>
</div>
