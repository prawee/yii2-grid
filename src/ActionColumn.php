<?php

/*
 * 2014-07-18
 * @author Prawee Wongsa <konkeanweb@gmail.com>
 */

namespace prawee\grid;

use Yii;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn {

    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                return Html::a('<span class="fa fa-eye-open btn btn-xs btn-outline-primary"></span>', $url, [
                    'title' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'data-placement' => 'bottom',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                return Html::a('<span class="fa fa-pencil btn btn-xs btn-outline-warning"></span>', $url, [
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'data-placement' => 'bottom',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                return Html::a('<span class="fa fa-trash btn btn-xs btn-outline-danger"></span>', $url, [
                    'title' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'data-placement' => 'bottom',
                    'data-toggle'=>'tooltip'
                ]);
            };
        }
    }

}
