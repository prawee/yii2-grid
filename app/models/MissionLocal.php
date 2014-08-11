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
    public static function insertByLoop($data,$sceneId){
        foreach ($data as $key => $value){
            foreach($value as $request){
                if($request['name']){
                    $model=new self;
                    $model->name =(string)$request['name'];
                    $model->databasedata_id=(int)Databasedata::insertGetId($request->DatabaseData);
                    $model->progzone_id=(int)  Progzone::insertGetId($request->ProgZone);
                    $model->definition_id=(int) Definition::insertGetId($request->Definition);
                    $model->criteria_id=(int) Criteria::insertGetId($request->Criteria);
                    $model->scene_id=$sceneId;
                    $model->version=(string)$request['version'];
                    $model->image=(string)$request['image'];
                    $model->type=(string)$request['type'];
                    $model->status=(string)$request['status'];
                    $model->save(false);
                }
            }
        }
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
    
    public static function insertGetId($data){
        if(is_object($data)){
            $model=new self;
            $model->name =(string)$data['name'];
            if($data->DatabaseData){
                $model->databasedata_id=(int)Databasedata::insertGetId($data->DatabaseData);
            }
            if($data->ProgZone){
                $model->progzone_id=(int)  Progzone::insertGetId($data->ProgZone);
            }
            if($data->Definition){
                $model->definition_id=(int) Definition::insertGetId($data->Definition);
            }
            if($data->Criteria){
                $model->criteria_id=(int) Criteria::insertGetId($data->Criteria);
            }
            $model->version=(string)$data['version'];
            $model->image=(string)$data['image'];
            $model->type=(string)$data['type'];
            $model->status=(string)$data['status'];
            $model->save();
            return $model->id;
        }
        return null;
    }
    public static function insertGetId2($xml,$data){
        //echo '<pre>'.print_r($data->attributes,true).'</pre>';
        echo '<pre>'.print_r($xml->DatabaseData,true).'</pre>';
        if(is_object($xml)){
            if($xml['DBTable']=='MISSION_LOCAL'){
                $model=new self;
                //attributes
                $model->attr_version=self::trim($xml['version']);
                $model->attr_image=self::trim($xml['image']);
                $model->attr_type=self::trim($xml['type']);
                $model->attr_status=self::trim($xml['status']);
                $model->attr_lock=self::trim($xml['lock']);
                $model->attr_name=self::trim($xml['name']);
                $model->name=self::trim($xml[0]);
                
                //databasedata
                $model->dbd_miseo_reference=self::trim($xml->DatabaseData->ReferenceMiseo);
                $model->dbd_miseo_group=self::trim($xml->DatabaseData->Group);
                $model->dbd_miseo_group=self::trim($xml->DatabaseData->Group);
                
                //xml data
                $model->distributor_id=$data->distributor_id;
                $model->client_id=$data->client_id;
                $model->scene_id=$data->scene_id;
                
                
                echo '<pre>'.print_r($model->attributes,true).'</pre>';
            }
        }
        exit;
    }
    public static function trim($data){
        return (string)trim($data);
    }
}
