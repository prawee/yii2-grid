<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Databasedata as CDatabasedata;

class Databasedata extends CDatabasedata{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}
