<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\MiseoGroupLocal as CMiseoGroupLocal;
class MiseoGroupLocal extends CMiseoGroupLocal{
    public static function insertBySceneId($sceneId) {
        $model = new self;
        $model->scene_id = $sceneId;
        $model->databasedata_id = (int) Databasedata::insertGetId();
        $model->groupzone_id = (int) Groupzone::insertGetId();
        $model->save(false);
    }

    public static function updateBySceneId($data,$sceneId){
        $model = self::find()->where(['scene_id'=>$sceneId])->one();	
        if($model->id){
            $model->name = (string) $data['name'];
            $model->version = (string) $data['version'];
            $model->type = (string) $data['type'];
            //$model->databasedata_id = (int) PDatabasedata::insertGetId($data->DatabaseData);
            //$model->groupzone_id = (int) PGroupzone::insertGetId($data->GroupZone);
            //$model->mission_local_id = PMissionLocal::insertGetId($data->Requests);
            //print_r($model->attributes);
            $model->save();
        }
    }
}
