<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\DownlinkStation as CDownlinkStation;
class DownlinkStation extends CDownlinkStation{
    
    public static function getIdByValue($value){
        $model = self::find()->where(['value'=>$value])->one();
        return $model->id;
    }
}

