<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Progzone as CProgzone;
class Progzone extends CProgzone{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}

