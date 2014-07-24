<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Databasedata as CDatabasedata;

class Databasedata extends CDatabasedata{
    public static function insertGetId($sceneId){
        $model=new self;
        $model->scene_id=$sceneId;
        $model->save(false);
    }
}
