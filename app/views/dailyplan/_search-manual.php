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
        <b>Upload Plan</b>
        <p class="" style="margin-top:15px;">
            <?= Html::a(Icon::show('plus') . 'Upload New Plan', [ 'xmldailyplan/index'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="col-xs-5 well well-sm">
        <b>Planing Date</b>
        <p style="margin-top:15px;">
            <?php
            echo DatePicker::widget([
                'model'=>$model,
                'attribute' => 'start_date',
                'options' => [
                    'readonly' =>false,
                    'placeholder'=>'Plan Date',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ],
                'pluginEvents'=>[
                    'changeDate'=>"function(e){ 
                        //$.fn.yiiGridView.update('#dailyplan-grid');
                        $.pjax({container: '#dailyplan-grid'})
                     }"
                ]
            ]);
            ?>
        </p>
    </div>
    <div class="col-xs-5 well-sm well text-center">
        <p class="text-left"><b>Tool</b></p>
        <p style="margin-top:15px;">
            <?php
            echo ButtonGroup::widget([
                'buttons' => [
                    //Button::widget(['label' => 'A']),
                    [
                        'label' => Icon::show('save') . 'Shape Current Page',
                        'options' => ['class' => 'btn-default']
                    ], [
                        'label' => Icon::show('upload') . 'Export Current Page',
                        'options' => ['class' => 'btn-default']
                    ], [
                        'label' => Icon::show('times') . 'Remove',
                        'options' => ['class' => 'btn-default']
                    ],
                ],
                'encodeLabels' => false,
            ]);
            ?>
        </p>
    </div>
</div>

