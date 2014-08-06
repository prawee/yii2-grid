<?php

use yii\helpers\Html;
//use kartik\daterange\DateRangePicker;
use kartik\field\FieldRange;
use kartik\icons\Icon;

Icon::map($this);
?>
<div class="satellite-filter">
    <div class="col-lg-6 well well-sm">
        <b>Daily Schedule</b>
            <?=
            FieldRange::widget([
                //'form' => $form,
                //'model' => $model,
                'name1'=>'a',
                'name2'=>'b',
                //'label' => 'Daily Schedule',
                'attribute1' => 'id',
                'attribute2' => 'id',
                'labelOptions'=>[
                    'style'=>'margin-top:5px',
                ],
                'type' => FieldRange::INPUT_DATE,
            ]);
            ?>
    </div>
    <div class="col-lg-3 well well-sm">
        <b>Downlink Station</b>
        <p style="margin-top:15px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <select class="form-control">
                    <option>Downlink station</option>
                </select>
            </div>
        </div>
        </p>
    </div>
    <div class="col-lg-3 well well-sm text-center">
        <p class="text-left"><b>Manage Downlink Station</b></p>
        <p class="" style="margin-top:15px;">
            <?=
            Html::a(Icon::show('plus') . 'Edit Downlink Station', '#', [
                'class' => 'btn btn-success'
            ])
            ?>
        </p>
    </div>
</div>
