<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\MissionLocal as CMissionLocal;
class MissionLocal extends CMissionLocal{
    public static function insertBySceneId($sceneId){
        $model=new self;
        $model->databasedata_id=(int)  Databasedata::insertGetId();
        $model->progzone_id=(int)  Progzone::insertGetId();
        $model->definition_id=(int) Definition::insertGetId();
        $model->criteria_id=(int)  Criteria::insertGetId();
        $model->scene_id=$sceneId;
        $model->save(false);
    }
}
