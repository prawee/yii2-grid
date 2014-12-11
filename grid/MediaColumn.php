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
    /*
     * attribute for compare with
     * @params
     */
    public $compareWith;
    public function init()
    {
        parent::init();
    }

    public function renderDataCellContent($model,$key,$index){
        if($this->format[$model->{$this->compareWith}]=='image'){
            return $this->Image($model);
        }

        if($this->format[$model->{$this->compareWith}]=='video'){
            return $this->Video($model);
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
    protected function Video($model){
        return 'Video';
    }
}

