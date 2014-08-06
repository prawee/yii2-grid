<?php
use yii\helpers\Html;
//use yii\jui\DatePicker;
use kartik\widgets\DatePicker;
//use zhuravljov\widgets\DatePicker;
use yii\bootstrap\ButtonGroup;
//use yii\bootstrap\Button;
use kartik\icons\Icon;
//use yii\bootstrap\Dropdown;
//use yii\widgets\InputWidget;

Icon::map($this);
?>
<div class="uss-filter">
    <div class="col-sm-5 well well-sm">
        <b>Select Data</b>
        <p class="margin-top:15px;">
        <div class="row">
            <div class="col-xs-4 col-sm-4 bg-danger">
                <select class="form-control col-xs-3">
                    <option>==Distributor==</option>
                </select>
            </div>
            <div class="col-xs-4 col-sm-4 bg-success">
                <select class="form-control col-xs-3">
                    <option>==Client==</option>
                </select>
            </div>
            <div class="col-xs-4 col-sm-4 bg-info">
                <select class="form-control col-xs-3">
                    <option>==XML Name==</option>
                </select>
            </div>
        </div>
        </p>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-xs-6 well well-sm">
                <p class="text-left"><b>Data Selection</b></p>
                <div class="bg-info">
                <p style="margin-top:15px;">
                    <?php
                    $picker=DatePicker::widget([
                                'name' => 'date',
                                'options' => [
                                    'style'=>'width:100%;'
                                ]
                            ]);
                    echo ButtonGroup::widget([
                        //'options' => ['class' => 'col-xs-12'],
                        'buttons' => [
                            [
                                'label' => 'a', 
                                'options' => [
                                    'class' => 'btn-default col-xs-4'
                                ]
                            ],
                            [
                                'label' => 'b',
                                'options' => [
                                    'class' => 'btn-default col-xs-4'
                                ]
                            ],
                            [
                                'label' => 'c',
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

