<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Priority as CPriority;
class Priority extends CPriority{
    public static function getIdByValue($value){
        $model=self::find()->where(['value'=>(string)trim($value)])->one();
        return (!empty($model->id)?$model->id:null);
    }
}

