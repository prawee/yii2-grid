<?php

/*
 * 2014-07-28
 * @author Prawee Wongsa <konkeanweb@gmail.com>
 */

namespace prawee\grid;

use Yii;
use yii\helpers\Html;
use yii\grid\ActionColumn;

class ActionChildColumn extends ActionColumn {
    /*
     * for support multi params
     * @return array
     */
    public $params;
    /*
     * 2014-08-08
     */
    public function init() {
        parent::init();
        if(is_array($this->params)){
            $this->params='&'.http_build_query($this->params);
        }else{
            $this->params='&'.http_build_query(['ref'=>Yii::$app->getRequest()->get('id')]);
        }
    }

    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                $url.=$this->params;
                return Html::a('<span class="glyphicon glyphicon-eye-open btn btn-xs btn-primary"></span>',$url, [
                            'title' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                $url.=$this->params;
                return Html::a('<span class="glyphicon glyphicon-pencil btn btn-xs btn-warning"></span>',$url, [
                            'title' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                $url.=$this->params;
                return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-danger"></span>',$url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
    }

}
