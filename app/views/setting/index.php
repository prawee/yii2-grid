<?php
use yii\helpers\Html;
use kartik\icons\Icon;
Icon::map($this);

$this->title = 'Setting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">
    <?php
    $sizeClass='fa-2x';
    ?>
    <?php
    $icon=Icon::show('user',['class'=>$sizeClass]);
    $text=Html::tag('p','Permission');
    echo Html::a('<div class="btn btn-success text-center">'.$icon.$text.'</div>',['/auth/permission'], [
    ])
    ?>
    
    <?php
    $icon=Icon::show('star',['class'=>$sizeClass]);
    $text=Html::tag('p','Downlink Station');
    echo Html::a('<div class="padding-left-lg btn btn-success text-center">'.$icon.$text.'</div>',['/downlink-station/index'], [
    ])
    ?>
</div>