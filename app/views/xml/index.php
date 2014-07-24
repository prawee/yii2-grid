<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

$this->title = 'Xmls';
//$this->params['breadcrumbs'][] = $this->title;
Modal::begin([
    'id' =>'content-modal',
    'header' => Icon::show('star') . '<b>XML Import</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ]
]);

$id=Yii::$app->getRequest()->get('id');
?>
<div class="xml-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('plus').' Create', ['create','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState'=>false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            //'path',
            //'user_id',
            // 'scene_id',
            [
                'attribute' => 'send_email',
                'filter' => [0 => 'Inactive', 1 => 'Active'],
                'value' => function($data) {
                    return ($data->send_email == 1 ? 'Yes' : 'No');
                },
                'options' => [
                    'style' => 'width:100px;'
                ]
            ],
            [
                'attribute' => 'status',
                'filter' => [0 => 'Inactive', 1 => 'Active'],
                'value' => function($data) {
                    return ($data->status == 1 ? 'Active' : 'Inactive');
                },
                'options' => [
                    'style' => 'width:100px;'
                ]
            ],
            [
                'class' => 'prawee\grid\ActionColumn',
                'template'=>'{import} {delete}',
                'buttons'=>[
                    'import' => function($url,$model) {
                        if($model->status===0){
                            $ref=Yii::$app->getRequest()->get('id');
                            $url=['import','id'=>$model->id,'ref'=>$ref];
                            return Html::a('<span class="glyphicon glyphicon-upload btn btn-xs btn-success"></span>',$url,[
                                'data-pjax'=>'0',
                                'title'=>' Import ',
                            ]);
                            
                        }else{
                            return '<span class="label btn btn-xs btn-warning">Yes</span>';
                        }
                    },
                    'delete'=>function($url,$model){
                        $ref=Yii::$app->getRequest()->get('id');
                        $url=['delete','id'=>$model->id,'ref'=>$ref];
                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-danger"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                    }
                ]
                
            ],
        ],
    ]);
    ?>
    <?php Pjax::end()?>
    <?= Html::a(Icon::show('times-circle').'Close',['/uss/index'],[
        'class' => 'btn btn-danger', 
        'name' => 'assign-button',
    ]) ?>
</div>
<?php
Modal::end();