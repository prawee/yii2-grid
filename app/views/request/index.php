<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this);

use yii\widgets\Pjax;

use app\models\MissionLocal;
use app\models\SplittedStripLocal;

$this->title = 'Request Analysis';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search-manual', ['model' => $searchModel]); ?>
<div class="clearfix"></div>
<div class="scene-index">
    <div class="scrollspy-board" data-spy="scroll" data-offset="0">
        <?php
        Pjax::begin([
            'id' => 'Pjax',
            'enablePushState' => false
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii\grid\SerialColumn'],
                ['class' => '\yii\grid\CheckboxColumn'],
                'wo_doc_name',
                'aoi_name',
                [
                    'header'=>'Request Name',
                    'attribute'=>'missionLocals.attr_name',
                    'value'=>function($data){
                        $model=MissionLocal::find()->where(['scene_id'=>$data->id])->one();
                        return ($model['attr_name']?$model['attr_name']:null);
                    }
                ],
                [
                    'header'=>'Strip Name',
                    'attribute'=>'splittedStripLocals.attr_name',
                    'value'=>function($data){
                        $model=SplittedStripLocal::find()->where(['scene_id'=>$data->id])->one();
                        return ($model['attr_name']?$model['attr_name']:null);
                    }
                ],
                [
                    'attribute'=>'id',
                    'header'=>'Rev No.',
                    'value'=>function($data){return null;}
                ],
                [
                    'attribute'=>'id',
                    'header'=>'Lastest Program Date',
                    'value'=>function($data){return null;}
                ],
                [
                    'attribute'=>'id',
                    'header'=>'Delivery Date',
                    'value'=>function($data){return null;}
                ],
                [
                    'header'=>'Deposit Date',
                    'attribute'=>'missionLocals.def_deposit_date',
                    'value'=>function($data){
                        $model=MissionLocal::find()->where(['scene_id'=>$data->id])->one();
                        return ($model['def_deposit_date']?$model['def_deposit_date']:null);
                    }
                ],
                [
                    'class' => 'prawee\grid\ActionColumn',
                    'template' => '{shape}  {export}  {info} {orbit} {import}',
                    'header' => 'Action & Infomation.',
                    'buttons' => [
                        'shape' => function($url,$data) {
                            $model=MissionLocal::find()->where(['scene_id'=>$data->id])->one();
                            switch(trim($model['attr_name'])){
                                case 'THA_AMNATCHA_20140803_URG_FL':
                                    $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_AMNATCHA_20140803_URG_FL-Strip_01.zip';
                                    break;
                                case 'THA_SAKHONNAK_20140805_URG_FL':
                                    $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_SAKHONNAK_20140805_URG_FL-Strip_01.zip';
                                    break;
                                default: 
                                    $urlFile=['request/index'];
                                    break;
                            }
                            return Html::a(Icon::show('file-zip-o'),$urlFile, [
                                        'data-pjax' => '0',
                                        'title' => ' Shape ',
                                        'class' => 'btn btn-xs btn-danger',
                            ]);
                        },
                        'export' => function($url,$data) {
                            $model=MissionLocal::find()->where(['scene_id'=>$data->id])->one();
                            switch(trim($model['attr_name'])){
                                case 'THA_AMNATCHA_20140803_URG_FL':
                                    $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_AMNATCHA_20140803_URG_FL-01.xls';
                                    break;
                                case 'THA_SAKHONNAK_20140805_URG_FL':
                                    $urlFile='http://mvos3.gistda.or.th/tpt/uploads/shape/THA_SAKHONNAK_20140805_URG_FL-01.xls';
                                    break;
                                default: 
                                    $urlFile=['request/index'];
                                    break;
                            }
                            return Html::a(Icon::show('upload'),$urlFile, [
                                        'data-pjax' => '0',
                                        'title' => ' Export ',
                                        'class' => 'btn btn-xs btn-danger',
                            ]);
                        },
                        'info' => function($url, $model) {
                            return Html::a(Icon::show('info'), $url, [
                                        'data-pjax' => '0',
                                        'title' => ' Info ',
                                        'class' => 'btn btn-xs btn-info',
                            ]);
                        },
                        'orbit' => function($url, $model) {
                            return Html::a(Icon::show('support'), $url, [
                                        'data-pjax' => '0',
                                        'title' => ' Orbit ',
                                        'class' => 'btn btn-xs btn-warning',
                            ]);
                        },
                        'import' => function($url, $model) {
                            return Html::a(Icon::show('download'), ['/xml/index', 'id' => $model->id, 'type' => 1], [
                                        'data-pjax' => '0',
                                        'title' => ' Import ',
                                        'class' => 'btn btn-xs btn-success',
                            ]);
                        }
                    ],
                    'options' => ['class' => 'width-action'],
                ],
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
