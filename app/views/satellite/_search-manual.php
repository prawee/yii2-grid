<?php

use yii\helpers\Html;
//use kartik\daterange\DateRangePicker;
use kartik\field\FieldRange;
use kartik\icons\Icon;
Icon::map($this);
use yii\helpers\ArrayHelper;

use app\models\MissionLocal;
use app\models\DownlinkStation;
$model=new MissionLocal;
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
                <?php
                $items=  ArrayHelper::map(DownlinkStation::find()->asArray()->all(),'id','name');
                echo Html::activeDropDownList($model,'id', $items,[
                    'prompt'=>'Downlink Station',
                    'class'=>'form-control col-xs-3'
                ]);
                ?>
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
