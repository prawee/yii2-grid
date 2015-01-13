<?php
/**
 * Created by PhpStorm.
 * User: Samuraimax
 * Date: 1/13/2015
 * Time: 10:41 AM
 */
namespace prawee\grid;

use Yii;
use yii\helpers\Html;

class ActionAuthColumn extends \yii\grid\ActionColumn {

    protected function initDefaultButtons() {
        $this->auth = !empty($this->auth)?$this->auth:FALSE; // Default Button auth

        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model) {
                if(($this->auth == FALSE) or ($this->auth == TRUE && $this->buttons['auth']['view'] == TRUE)){
                    return Html::a('<span class="glyphicon glyphicon-eye-open btn btn-xs btn-primary"></span>', $url, [
                        'title' => Yii::t('yii', 'View'),
                        'data-pjax' => '0',
                        'data-toggle'=>'tooltip'
                    ]);
                }else{
                    return '';
                }

            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                if(($this->auth == FALSE) or ($this->auth == TRUE && $this->buttons['auth']['update'] == TRUE)){
                    return Html::a('<span class="glyphicon glyphicon-pencil btn btn-xs btn-warning"></span>', $url, [
                        'title' => Yii::t('yii', 'Update'),
                        'data-pjax' => '0',
                        'data-toggle'=>'tooltip'
                    ]);
                }else{
                    return '';
                }

            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                if(($this->auth == FALSE) or ($this->auth == TRUE && $this->buttons['auth']['delete'] ==TRUE)){
                    return Html::a('<span class="glyphicon glyphicon-trash btn btn-xs btn-danger"></span>', $url, [
                        'title' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item ?'),
                        'data-method' => 'post',
                        'data-pjax' => '0',
                        'data-toggle'=>'tooltip'
                    ]);
                }else{
                    return '';
                }

            };
        }
    }

}
