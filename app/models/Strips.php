<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Strips as CStrips;
class Strips extends CStrips{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}

