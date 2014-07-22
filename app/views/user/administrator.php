<?php
/*
 * 20140722
 * prawee@hotmail.com
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);
use yii\widgets\Pjax;

$this->title = 'Administrator';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'id' => 'xs-modal',
    'header' => Icon::show('user') . '<b>Administrator</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="administrator-index">
    <p>
        <?= Html::a(Icon::show('plus') . ' Create', ['create-admin'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState'=>false]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'fullname', 'label' => 'Name'],
            ['attribute' => 'username', 'label' => 'User Name'],
            'organization',
            'email:email',
            'telephone',
            'address:ntext',
            [
                'class' => 'prawee\grid\ActionColumn',
                'template' => '{update} {delete}',
                'options' => ['style' => 'width:70px;'],
                'buttons'=>[
                    'update'=>function($url,$data){
                        return Html::a('<span class="glyphicon glyphicon-edit btn btn-xs btn-warning"></span>',['update-admin','id'=>$data->id],[
                            'data-pjax'=>'0',
                            'title'=>'Update',
                        ]);
                    },
                    'delete'=>function($url,$data){
                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-danger"></span>',['delete-admin','id'=>$data->id],[
                            'data-pjax'=>'0',
                            'title'=>'Update',
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>
    <?php Pjax::end();?>
    <?=
    Html::a(Icon::show('times') . 'Close', ['/user/index'], [
        'class' => 'btn btn-danger',
        'name' => 'assign-button',
    ]);
    ?>
    
</div>
<?php
Modal::end();
