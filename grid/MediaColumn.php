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
            $this->Image();
        }
    }
    protected function Image(){
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

