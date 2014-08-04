<?php

//use yii\jui\DatePicker;
use kartik\widgets\DatePicker;
//use zhuravljov\widgets\DatePicker;
use yii\bootstrap\ButtonGroup;
//use yii\bootstrap\Button;
use kartik\icons\Icon;
use yii\bootstrap\Dropdown;
//use yii\widgets\InputWidget;

Icon::map($this);
?>

<div class='uss-filter'>
    <div class="col-md-5 well well-sm">
        <b>Select Data</b>
        <p style="margin-top:15px;">
           
        </p>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-6 well well-sm">
                <p class="text-left"><b>Data Selection</b></p>
                <p style="margin-top:15px;">
                    <?php
                    $picker=DatePicker::widget([
                                'name' => 'date',
                                'options' => [
                                    'style'=>'width:70px;'
                                ]
                            ]);
                    echo ButtonGroup::widget([
                        'options' => ['class' => 'col-xs-12'],
                        'buttons' => [
                            [
                                'label' => 'All Day', 
                                'options' => [
                                    'class' => 'btn-default col-xs-3'
                                ]
                            ],
                            [
                                'label' => 'Choose Date',
                                'options' => [
                                    'class' => 'btn-default col-xs-4'
                                ]
                            ],
                            $picker
                        ],
                        'encodeLabels' => false,
                    ]);
                    
                    ?>
                </p>
            </div>
            <div class="col-md-6 well well-sm text-center">
                <p class="text-left"><b>Tool</b></p>
                <p style="margin-top:15px;">
                    <?php
                    echo ButtonGroup::widget([
                        //'options' => ['class' => 'col-sm-12'],
                        'buttons' => [
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
    </div>
</div>

