<?php
/*
 * 2014-07-31
 * konkeanweb@gmail.com
 */
use yii\helpers\Html;
use yii\bootstrap\Modal; 
use kartik\icons\Icon;
Icon::map($this);

$this->title = 'Orbit';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('info') . '<b>Orbit</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="uss-orbit-index">
    <div class="row">
        <div class="col-xs-12">
            
            <?=
            Html::a(Icon::show('times') . 'Close', ['/uss/index'], [
                'class' => 'btn btn-danger',
                'name' => 'assign-button',
            ]);
            ?>
        </div>
    </div>
</div>
<?php
Modal::end();