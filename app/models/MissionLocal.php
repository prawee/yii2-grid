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
        $model->scene_id=$sceneId;
        $model->save(false);
    }
}
