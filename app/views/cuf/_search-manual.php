<?php

use yii\helpers\Html;
//use yii\bootstrap\Button;
use yii\bootstrap\ButtonGroup;
use kartik\widgets\DatePicker;
use kartik\icons\Icon;

Icon::map($this);
//use yii\web\JsExpression;
?>
<div class="plan-local-filter">
    <div class="col-xs-2 well well-sm">
        <b>Upload CUF File</b>
        <p class="" style="margin-top:15px;">
            <?= Html::a(Icon::show('plus') . 'Upload New CUF','#', ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-xs-7 well well-sm">
        <p class="text-left"><b>Select Data</b></p>
        <p class="" style="margin-top:15px;">
        <div class="row">
            <div class="col-sm-4 col-xs-7">
                <?php
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'id',
                    'options' => [
                        'readonly' => false,
                        'placeholder' => 'Begin Reception Date',
                    ],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ],
                    'pluginEvents' => [
                        'changeDate' => "function(e){
                  //$.fn.yiiGridView.update('#dailyplan-grid');
                  $.pjax({container: '#dailyplan-grid'})
                  }"
                    ]
                ]);
                ?>
            </div>
            <div class="col-sm-4">
                <select class="form-control col-xs-3">
                    <option>==Revolution No==</option>
                </select>
            </div>
            <div class="col-sm-4">
                <select class="form-control col-xs-3">
                    <option>==XML Name==</option>
                </select>
            </div>
        </div>
        </p>
    </div>
    <div class="col-xs-3 well-sm well text-center">
        <p class="text-left"><b>Tool</b></p>
        <p style="margin-top:15px;">
            <?php
            echo ButtonGroup::widget([
                'buttons' => [
                    [
                        'label' => Icon::show('times') . 'Remove',
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

