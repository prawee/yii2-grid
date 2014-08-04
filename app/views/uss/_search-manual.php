<?php 
//use kartik\widgets\DatePicker;
use yii\bootstrap\ButtonGroup;
use kartik\icons\Icon;
Icon::map($this);
?>

<div class='uss-filter'>
    <div class="col-xs-4 well well-sm">
        <b>Select Data</b>
    </div>
    <div class="col-xs-4 well well-sm">
        <b>Data Selection</b>
    </div>
    <div class="col-xs-4 well well-sm text-center">
        <p class="text-left"><b>Tool</b></p>
        <p style="margin-top:15px;">
            <?php
            echo ButtonGroup::widget([
                'buttons' => [
                    //Button::widget(['label' => 'A']),
                    [
                        'label' => Icon::show('times') . 'Remove',
                        'options' => ['class' => 'btn-default']
                    ], [
                        'label' => Icon::show('eye') . 'View',
                        'options' => ['class' => 'btn-default']
                    ], [
                        'label' => Icon::show('edit') . 'Change Status',
                        'options' => ['class' => 'btn-default']
                    ],
                ],
                'encodeLabels' => false,
            ]);
            ?>
        </p>
    </div>
</div>

