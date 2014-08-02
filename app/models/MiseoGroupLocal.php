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
        //$model->databasedata_id = (int) Databasedata::insertGetId();
        //$model->groupzone_id = (int) Groupzone::insertGetId(); 
        $model->save(false);
    }

    public static function updateBySceneId($data,$sceneId){
        $model = self::find()->where(['scene_id'=>$sceneId])->one();	
        if($model->id){
            $model->name = (string) $data['name'];
            $model->version = (string) $data['version'];
            $model->type = (string) $data['type'];
            $model->status=(string) $data['status'];
            $model->image=(string) $data['image'];
            if($data->DatabaseData){
                $model->databasedata_id=(int)  Databasedata::insertGetId($data->DatabaseData);
            }
            if($data->GroupZone){
                $model->groupzone_id=(int)Groupzone::insertGetId($data->GroupZone);
            }
            $model->save();
            
            //Databasedata::updateXML($data->DatabaseData,$model->databasedata_id);
            //Groupzone::updateXML($data->GroupZone, $model->groupzone_id);       
        }
    }
}
