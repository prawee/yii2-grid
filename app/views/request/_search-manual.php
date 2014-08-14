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
use yii\helpers\ArrayHelper;
use auth\models\User;
use yii\web\JsExpression;

Icon::map($this);

$model=new app\models\MissionLocal;
?>
<div class="uss-filter">
    <div class="col-sm-5 well well-sm">
        <b>Select Data</b>
        <p class="margin-top:15px;">
        <div class="row">
            <div class="col-xs-4 col-sm-4">
                <?php
                $items=  ArrayHelper::map(User::find()->where(['role'=>88])->asArray()->all(),'id','username');
                echo Html::activeDropDownList($model,'id', $items,[
                    'prompt'=>'==Distributor==',
                    'class'=>'form-control col-xs-3'
                ]);
                ?>
            </div>
            <div class="col-xs-4 col-sm-4">
                <?php
                $items=  ArrayHelper::map(User::find()->where(['role'=>88])->asArray()->all(),'id','username');
                echo Html::activeDropDownList($model,'id', $items,[
                    'prompt'=>'==Client==',
                    'class'=>'form-control col-xs-3'
                ]);
                ?>
            </div>
            <div class="col-xs-4 col-sm-4">
                <select class="form-control col-xs-3">
                    <option>==XML Name==</option>
                </select>
            </div>
        </div>
        </p>
    </div>
    <div class="col-sm-7 well well-sm">
        <div class="row">
            <div class="col-xs-7 col-sm-7">
                <p class="text-left"><b>Date Selection</b></p>
                <div class="col-xs-3 col-sm-6 bg-danger">
                    <div class="row">
                    <?=ButtonGroup::widget([
                        'id'=>'uss-date-filter',
                        'buttons' => [
                            [
                                'label' => 'All Day', 
                                'options' => [
                                    'class' => 'btn-default col-sm-5'
                                ]
                            ],
                            [
                                'label' => 'Choose Date',
                                'options' => [
                                    'class' => 'btn-default col-sm-7'
                                ]
                            ],           
                        ],
                        'encodeLabels' => false,
                    ]);
                    ?>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-6 bg-success">
                    <div class="row">
                        <?=
                        DatePicker::widget([
                            'name' => 'date',
                            'options' => [
                                'class' => 'col-sm-12',
                                'default'=>true,
                            ],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-5 col-sm-5">
                <p class="text-left"><b>Tool</b></p>
                <p style="margin-top:10px;">
                    <?php
                    echo ButtonGroup::widget([
                        'id'=>'uss-tools-filter',
                        'buttons' => [
                            /*[
                                'label' => Icon::show('times') . 'Remove',
                                'options' => ['class' => 'btn-default']
                            ],*/ [
                                'label' => Icon::show('eye') . 'View',
                                'options' => ['class' => 'btn-default']
                            ], [
                                'label' => Icon::show('edit') . 'Change Status',
                                'options' => [
                                    'class' => 'btn-default',
                                    'id'=>'changeStatus',
                                    'onclick'=>new JsExpression("
                                        var id=$('#grid-request').yiiGridView('getSelectedRows');
                                        if(id.length){
                                            window.location.href='change-status?id='+id;
                                        }
                                    "),
                                ]
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


<div>
    <div class="col-sm-2 well well-sm">
<!--        <b>Type</b>-->
        <select class="form-control inline col-xs-3">
            <option>Type</option>
        </select>
    </div>
    <div class="col-sm-2 well well-sm">
<!--        <b>Accessible Orbit</b>-->
        <select class="form-control inline col-xs-3">
            <option>Accessible Orbit</option>
        </select>
    </div>
    <div class="col-sm-2 well well-sm">
        <input type="text" class="form-control" placeholder="Roll Max =>"/>
    </div>
    <div class="col-sm-2 well well-sm">
        <input type="text" class="form-control" placeholder="Roll Max <="/>
    </div>
    <div class="col-sm-4 well well-sm">
        <input type="text" class="form-control inline " placeholder="Search Keyword"/>
    </div>
</div>
