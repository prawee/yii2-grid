<?php
/*
 * 20140725
 * konkeanweb@gmail.com
 */
namespace prawee\grid;

//use Yii;
use yii\helpers\Html;
class ImageColumn extends \yii\grid\Column {
    public $attribute='';
    public $path='';
    public $options=[];
    public function renderDataCellContent($model){
        $image=$model->{$this->attribute};
        $path=$this->path.DIRECTORY_SEPARATOR.$image;
        return Html::img($path,$this->options);
    }
}

