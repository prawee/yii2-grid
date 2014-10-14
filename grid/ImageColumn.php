<?php
/*
 * 20140725
 * @author Prawee Wongsa <konkeanweb@gmail.com>
 */
namespace prawee\grid;

use Yii;
use yii\helpers\Html;
class ImageColumn extends \yii\grid\Column {
    public $attribute='';
    public $path='';
    public $options=[];
    public $thumbnail=false;
    public function init() {
        if($this->thumbnail){
            $this->options=array_merge($this->options,['class' => 'img-thumbnail',]);
        }
    }
    public function renderDataCellContent($model){
        if(!empty($model->{$this->attribute})){
            $image=$model->{$this->attribute};
            if($this->path){
                $path=Yii::$app->getUrlManager()->getBaseUrl().DIRECTORY_SEPARATOR.$this->path.DIRECTORY_SEPARATOR.$image;
            }else{
                $path=$image;
            }
            return Html::img($path,$this->options);
        }else{
            return Html::img('http://placehold.it/40x20',$this->options);
        }
    }
}

