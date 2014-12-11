<?php
/*
 * 20141211
 * @author Prawee Wongsa <konkeanweb@gmail.com>
 */
namespace prawee\grid;

use Yii;
use yii\helpers\Html;
use prawee\grid\ImageColumn;
class MediaColumn extends ImageColumn {
    /*
     * @params image,video
     */
    public $format;
    public function renderDataCellContent($model,$key,$index){
        if($this->format=='image'){
            $this->Image($model);
        }
    }
    protected function Image($model){
        if(!empty($model->{$this->attribute})){
            $image=$model->{$this->attribute};
            return Html::img($image,$this->options);
        }else{
            return Html::img('http://placehold.it/40x20',$this->options);
        }
    }
}

