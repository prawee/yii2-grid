<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;
Icon::map($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Icon::show('th').'Management Administrator', ['/user/administrator'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Icon::show('group').' Add Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'fullname','label'=>'Group Name'],
            ['attribute'=>'fullname','label'=>'Name'],
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
                'options'=>['style'=>'width:160px;'],
                'buttons'=>[
                    'user'=>function($url,$data){
                        return Html::a('<span class="glyphicon glyphicon-user btn btn-xs btn-success"></span>','#',[
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
                        return Html::a('<span class="glyphicon glyphicon-check btn btn-xs btn-success"></span>','#',[
                            'title'=>'Permission',
                            'data-pjax'=>'0'
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>

</div>
