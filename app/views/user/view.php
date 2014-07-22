<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon; Icon::map($this);
use yii\bootstrap\Modal;

$this->title = 'View ' . $model->username;

Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('user') . '<b>Administrator</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="user-view">
    <p>
        <?= Html::a(Icon::show('edit').' Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?=
        Html::a(Icon::show('times').' Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fullname',
            'username',
            'email:email',
            'telephone',
            'nation',
            'address:ntext',
            'expired_date',
            /*
            'created',
            'modified',
            'last_login',
            'organization',
            'status',*/
        ],
    ])
    ?>
    <p>
        <?= Html::a(Icon::show('times').'Close', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>
</div>
<?php
Modal::end();