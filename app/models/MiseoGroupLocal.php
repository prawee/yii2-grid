<?php

/*
 * 20140724
 * prawee@hotmail.com
 */

namespace app\models;

use common\models\MiseoGroupLocal as CMiseoGroupLocal;
use app\models\MissionLocal;

class MiseoGroupLocal extends CMiseoGroupLocal {

    public static function insertBySceneId($sceneId) {
        $model = new self;
        $model->scene_id = $sceneId;
        //$model->databasedata_id = (int) Databasedata::insertGetId();
        //$model->groupzone_id = (int) Groupzone::insertGetId(); 
        $model->save(false);
    }

    public static function updateBySceneId($data, $sceneId) {
        $model = self::find()->where(['scene_id' => $sceneId])->one();
        if ($model->id) {
            $model->name = (string) $data['name'];
            $model->version = (string) $data['version'];
            $model->type = (string) $data['type'];
            $model->status = (string) $data['status'];
            $model->image = (string) $data['image'];
            if ($data->DatabaseData) {
                $model->databasedata_id = (int) Databasedata::insertGetId($data->DatabaseData);
            }
            if ($data->GroupZone) {
                $model->groupzone_id = (int) Groupzone::insertGetId($data->GroupZone);
            }
            $model->save();

            //Databasedata::updateXML($data->DatabaseData,$model->databasedata_id);
            //Groupzone::updateXML($data->GroupZone, $model->groupzone_id);       
        }
    }

    public static function insertGetId($data) {
        if (is_object($data)) {
            $model = new self;
            $model->name = (string) $data['name'];
            $model->version = (string) $data['version'];
            $model->type = (string) $data['type'];
            $model->status = (string) $data['status'];
            $model->image = (string) $data['image'];
            if ($data->DatabaseData) {
                $model->databasedata_id = (int) Databasedata::insertGetId($data->DatabaseData);
            }
            if ($data->GroupZone) {
                $model->groupzone_id = (int) Groupzone::insertGetId($data->GroupZone);
            }
            $model->save();
            return $model->id;
        }
        return null;
    }

    public static function insertGetId2($data) {
        //echo '<pre>'.print_r($data,true).'</pre>';
        if (is_object($data)) {
            $model=new self;
            $model->attr_version=self::trim($data['version']);
            $model->attr_status=self::trim($data['status']);
            $model->attr_type=self::trim($data['type']);
            $model->attr_image=self::trim($data['image']);
            $model->attr_name=self::trim($data['name']);
            
            //databasedata
            $model->dbd_miseo_reference=self::trim($data->DatabaseData->ReferenceMiseo);
            $model->dbd_miseo_group=self::trim($data->DatabaseData->Group);
            $model->dbd_miseo_template=self::trim($data->DatabaseData->Template);
            
            //groupzone
            $model->gz_attr_name=self::trim($data->GroupZone['name']);
            $model->gz_attr_image=self::trim($data->GroupZone['image']);
            $model->gz_attr_type=self::trim($data->GroupZone['type']);
            $model->gz_attr_c1=self::trim($data->GroupZone['c1']);
            $model->gz_attr_c2=self::trim($data->GroupZone['c2']);
            $model->gz_attr_c3=self::trim($data->GroupZone['c3']);
            $model->gz_attr_c4=self::trim($data->GroupZone['c4']);
            $model->gz_miseo_name=self::trim($data->GroupZone->GroupName);
            $model->gz_info1=self::trim($data->GroupZone->Info1);
            $model->gz_info2=self::trim($data->GroupZone->Info2);
            $model->gz_info3=self::trim($data->GroupZone->Info3);
            $model->gz_info4=self::trim($data->GroupZone->Info4);
            if($model->save()){
                return $model->id;
            }else{
                Yii::$app->getSession()->setFlash('error','Miseo group local import error.');
                return null;
            }
            //echo '<pre>'.print_r($model->attributes,true).'</pre>';
        }
        return null;
    }

    public static function trim($data) {
        return MissionLocal::trim($data);
    }

}
