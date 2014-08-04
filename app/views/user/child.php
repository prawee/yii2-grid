<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this);

use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
$id=Yii::$app->getRequest()->get('id');
?>
<?php
Modal::begin([
    'id' => 'xs-modal',
    'header' => Icon::show('user') . '<b>User</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="user-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Icon::show('user') . ' Add User', ['create-child','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'fullname', 'label' => 'Group Name'],
            //['attribute'=>'fullname','label'=>'Name'],
            ['attribute' => 'username', 'label' => 'User Name'],
            ['attribute' => 'created', 'label' => 'Issue Date', 'options' => ['style' => 'width:155px;']],
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
                'template' => '{permission} {export} {update} {delete}',
                'options' => ['style' => 'width:115px;'],
                'buttons' => [
                    'export' => function($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-upload btn btn-xs btn-info"></span>', '#', [
                                    'title' => 'Export',
                                    'data-pjax' => '0'
                        ]);
                    },
                    'permission' => function($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-check btn btn-xs btn-success"></span>', '#', [
                                    'title' => 'Permission',
                                    'data-pjax' => '0'
                        ]);
                    },
                    'update'=>function($url,$data){
                        $ref=Yii::$app->getRequest()->get('id');
                        return Html::a('<span class="glyphicon glyphicon-edit btn btn-xs btn-warning"></span>',['update-child','id'=>$data->id,'ref'=>$ref],[
                            'data-pjax'=>'0',
                            'title'=>'Update',
                        ]);
                    },
                    'delete'=>function($url,$data){
                        $ref=Yii::$app->getRequest()->get('id');
                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-danger"></span>',['delete-child','id'=>$data->id,'ref'=>$ref],[
                            'data-pjax'=>'0',
                            'title'=>'Update',
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
    <?=
    Html::a(Icon::show('times') . 'Close', ['/user/index'], [
        'class' => 'btn btn-danger',
        'name' => 'assign-button',
    ]);
    ?>
</div>
<?php 
    Modal::end();