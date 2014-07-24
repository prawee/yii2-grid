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
    public static function updateBySceneId($data,$sceneId){
        $model = self::find()->where(['scene_id'=>$sceneId])->one();
        foreach ($data as $key => $value){
            foreach($value as $request){
                if($request['name']){
                    $model->name = (string) $request['name'];
                    $model->save();
                    
                    Databasedata::updateXML($request->DatabaseData,$model->databasedata_id);
                    Progzone::updateXML($request->ProgZone, $model->progzone_id);
                    Definition::updateXML($request->Definition, $model->definition_id);
                    Criteria::updateXML($request->Criteria, $model->criteria_id);
                }
            }
        }
    }
}
