<?php 
//use yii\jui\DatePicker;
use kartik\widgets\DatePicker;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Button;
use kartik\icons\Icon;
Icon::map($this);
?>

<div class='uss-filter'>
    <div class="col-xs-5 well well-sm">
        <b>Select Data</b>
    </div>
    <div class="col-xs-3 well well-sm text-center">
        <p class="text-left"><b>Data Selection</b></p>
        <p style="margin-top:15px;">
        <?php
        echo ButtonGroup::widget([
                'buttons' => [
                    Button::widget([
                        'label' => 'All Day',
                        'options'=>[
                            'class'=>'btn-default col-sm-3'
                         ]]),
                    Button::widget([
                        'label' => 'Choose Date',
                        'options'=>[
                            'class'=>'btn-default col-sm-5'
                        ]]),
                    DatePicker::widget([
                        'name'=>'date',
                        'options'=>[
                            'class'=>'col-sm-4',
                        ]
                    ]),
          
                ],
                'encodeLabels' => false,
            ]);
        ?>
        </p>
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

