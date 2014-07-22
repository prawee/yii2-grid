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

$this->title = 'Administrator';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('user') . '<b>Administrator</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="administrator-index">
    <p>
        <?= Html::a(Icon::show('plus') . ' Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                'options' => ['style' => 'width:100px;'],
            ],
        ],
    ]);
    ?>
    <?=
    Html::a(Icon::show('times') . 'Close', ['/user/index'], [
        'class' => 'btn btn-danger',
        'name' => 'assign-button',
    ]);
    ?>
</div>
<?php
Modal::end();
