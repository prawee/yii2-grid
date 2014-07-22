<?php
use yii\helpers\Html;
use kartik\icons\Icon;
Icon::map($this);
?>
<div class="row">
    <?php
    $icon=Icon::show('user',['class'=>'fa-3x']);
    $text=Html::tag('p','Permission');
    echo Html::a('<div class="col-xs-1 btn btn-success text-center">'.$icon.$text.'</div>',['/auth/permission'], [
    ])
    ?>
</div>
