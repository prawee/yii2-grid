<?php
/*
 * 2014-07-22
 * prawee@hotmail.com
 */

//use yii\helpers\Html;
//use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
Icon::map($this);

$this->title = 'Source Items';
$this->params['breadcrumbs'][] = $this->title;


Modal::begin([
    'id' =>'content-modal',
    'header' => Icon::show('cog') . '<b>Info</b>',
    'closeButton'=>[
        'aria-hidden' =>'true',
        'class'=>'hide',
    ],
    'size'=>'MODAL_LG'
]);
?>
<div class="source-item-index">

</div>
<?php
Modal::end();