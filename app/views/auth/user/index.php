<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'username',
        [
            'attribute' => 'email',
            'value' => function($data) {
                return '******';
            }
        ],
//        'status',
        [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{permission}{view}{update}{delete}',
            'buttons'=>[
                'permission'=>function($url,$data){
                    return Html::a(Icon::show('check') . 'Permission', ['/auth/user/permission', 'id' => $data->id], [
                        'class' => 'btn btn-xs btn-success',
                        'style'=>'margin-right:5px;',
                        'title'=>'Permission',
                        'data-pjax'=>'0'
                    ]);
                },
                'view'=>function($url,$data){
                    return Html::a(Icon::show('eye').'View',['/auth/user/view','id'=>$data->id],[
                        'class'=>'btn btn-xs btn-primary',
                        'style'=>'margin-right:5px;',
                        'title'=>'View',
                        'data-pjax'=>'0'
                    ]);
                },
                'update'=>function($url,$data){
                    return Html::a(Icon::show('edit').'Update',['/auth/user/update','id'=>$data->id],[
                        'class'=>'btn btn-xs btn-warning',
                        'style'=>'margin-right:5px;',
                        'title'=>'Update',
                        'data-pjax'=>'0'
                    ]);
                },
                'delete'=>function($url,$data){
                    return Html::a(Icon::show('times-circle').'Delete',['/auth/user/delete','id'=>$data->id],[
                        'class'=>'btn btn-xs btn-danger',
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                        'title'=>'Delete',
                        'data-pjax' => '0',
                    ]);
                }
            ]
        ]
    ]
]);
?>

