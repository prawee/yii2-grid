<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\icons\Icon;

Icon::map($this);

use yii\widgets\Pjax;

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
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => '\yii\grid\SerialColumn'],
                ['class' => '\yii\grid\CheckboxColumn'],
                'wo_doc_name',
                'aoi_name',
                [
                    'class' => 'prawee\grid\ActionColumn',
                    'template' => '{shape}  {export}  {info} {orbit} {import}',
                    'header' => 'Action & Infomation.',
                    'buttons' => [
                        'shape' => function($data) {
                            return Html::a(Icon::show('file-zip-o'), '#', [
                                        'data-pjax' => '0',
                                        'title' => ' Shape ',
                                        'class' => 'btn btn-xs btn-danger',
                            ]);
                        },
                        'export' => function($data) {
                            return Html::a(Icon::show('upload'), '#', [
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
