<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grid-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('th').'Management Administrator', ['/user/administrator'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Icon::show('group').' Add Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState'=>false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'fullname','label'=>'Group Name'],
            //['attribute'=>'fullname','label'=>'Name'],
            ['attribute'=>'username','label'=>'User Name'],
            ['attribute'=>'created','label'=>'Issue Date','options'=>['style'=>'width:155px;']],
            'telephone',
            'email:email',
            'nation',
            // 'role',
            // 'status',
            // 'created',
            // 'modified',
            // 'last_login',
            // 'user_type_id',
            
             
             
            // 'address:ntext',
            // 'organization',
            // 'expired_date',
            // 'parent_id',
            [
                'class' => 'prawee\grid\ActionColumn',
                'template'=>'{user} {permission} {export} {update} {delete}',
                'options'=>['style'=>'width:145px;'],
                'buttons'=>[
                    'user'=>function($url,$data){
                        return Html::a('<span class="glyphicon glyphicon-user btn btn-xs btn-success"></span>',['child','id'=>$data->id],[
                            'title'=>'Add User',
                            'data-pjax'=>'0'
                        ]);
                    },
                    'export'=>function($url,$data){
                        return Html::a('<span class="glyphicon glyphicon-upload btn btn-xs btn-info"></span>','#',[
                            'title'=>'Export',
                            'data-pjax'=>'0'
                        ]);
                    },
                    'permission'=>function($url,$data){
                        $url=['user/permission','id'=>$data->id];
                        return Html::a('<span class="glyphicon glyphicon-check btn btn-xs btn-success"></span>',$url,[
                            'title'=>'Permission',
                            'data-pjax'=>'0'
                        ]);
                    }
                ]
            ],
        ],
    ]);
               
    ?>
    <?php    Pjax::end(); ?>
</div>
