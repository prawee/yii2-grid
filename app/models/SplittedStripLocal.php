<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\SplittedStripLocal as CSplittedStripLocal;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class SplittedStripLocal extends CSplittedStripLocal {
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created','modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function insertBySceneId($sceneId) {
        $model = new self;
        $model->databasedata_id = (int) Databasedata::insertGetId();
        $model->strips_id = (int) Strips::insertGetId();
        $model->scene_id = $sceneId;
        $model->save(false);
    }
    public static function insertByLoop($data,$sceneId){
        foreach ($data as $key => $value){
            foreach($value as $request){ 
                foreach($request->STRIPS as $aaa=>$bbb){
                    $stname = 'ST' . sprintf('%02d', $bbb);
                    if($request->STRIPS->{$stname}['name']){
                        $model=new self;
                        $model->databasedata_id=(int)  Databasedata::insertGetId($request->STRIPS->{$stname}->DatabaseData);
                        $model->strips_id=(int)Strips::insertGetId($request->STRIPS->{$stname}->Definition);
                        $model->scene_id=(int)$sceneId;
                        $model->status=(int)$request->STRIPS->{$stname}['status'];
                        $model->type=(string)$request->STRIPS->{$stname}['type'];
                        $model->image=(string)$request->STRIPS->{$stname}['image'];
                        $model->name=(string)$request->STRIPS->{$stname}['name'];
                        $model->save(false);
                        StripAccessLocal::insertBySplitted($request->STRIPS->{$stname}->Passes, $model->id);
                    }
                }
            }
        }
    }
    public static function updateBySceneId($data,$sceneId){
        $model = self::find()->where(['scene_id'=>$sceneId])->one();
        //echo '<pre>'.print_r($model->attributes,true).'</pre>';
        foreach ($data as $key => $value){
            foreach($value as $request){ 
                //echo '<pre>'.print_r($request->STRIPS->ST01,true).'</pre>';

                foreach($request->STRIPS as $aaa=>$bbb){
                    $stname = 'ST' . sprintf('%02d', $bbb);
                    if($request->STRIPS->{$stname}['name']){
                        //echo $request->STRIPS->{$stname}['name'];
                        //echo '<pre>'.print_r($request->STRIPS->{$stname}->DatabaseData,true).'</pre>';
                        Databasedata::updateXML($request->STRIPS->{$stname}->DatabaseData,$model->databasedata_id);
                        Strips::updateXML($request->STRIPS->{$stname}->Definition,$model->strips_id);
                        
                        //echo '<pre>'.print_r($request->STRIPS->{$stname}->Passes,true).'</pre>';
                        StripAccessLocal::insertBySplitted($request->STRIPS->{$stname}->Passes, $model->id);
                    }
                }
            }
        }
    }
    
    public static function insertGetId($data){
        //echo '<pre>'.print_r($data,true).'</pre>';
        if(is_object($data)){
            $model=new self;
            $model->name=(string)$data['name'];
            $model->image=(string)$data['image'];
            $model->type=(string)$data['type'];
            $model->status=(string)$data['status'];
            if($data->DatabaseData){
                $model->databasedata_id=(int) Databasedata::insertGetId($data->DatabaseData);
            }
            if($data->Definition){
                $model->strips_id=(int)  Strips::insertGetId($data->Definition);
            }
            $model->save();
            
            if($data->Passes){
                StripAccessLocal::insertBySplitted($data->Passes, $model->id);
            }
            if($data->Trials){
                TrialLocal::insertGetId($data->Trials);
            }
        }
        return null;
    }
    public static function insertWithStrip($xml,$data,$missionId){
        //echo '<pre>'.print_r($xml,true).'</pre>';
        //echo '<pre>'.print_r($data->attributes,true).'</pre>';
        if(is_object($xml)){
            $model=new self;
            $model->mission_local_id=$missionId;
            $model->attr_status=self::trim($xml['status']);
            $model->attr_type=  self::trim($xml['type']);
            $model->attr_image=  self::trim($xml['image']);
            $model->attr_lock=  self::trim($xml['lock']);
            $model->attr_name= self::trim($xml['name']);
            
            //databasedata;
            $model->dbd_miseo_reference=self::trim($xml->DatabaseData->ReferenceMiseo);
            $model->dbd_miseo_group=self::trim($xml->DatabaseData->Group);
            $model->dbd_miseo_template=self::trim($xml->DatabaseData->Template);
            $model->dbd_satellite=self::sattellite($xml->DatabaseData->ReqSatellite);
            $model->dbd_phase=self::phase($xml->DatabaseData->StripOrbitPhase);
            $model->dbd_delta_lat_north=self::trim($xml->DatabaseData->DeltaLatNorth);
            $model->dbd_delta_lat_south=self::trim($xml->DatabaseData->DeltaLatSouth);
            
            //definition
            $model->def_attr_name=self::trim($xml->Definition['name']);
            $model->def_attr_image=self::trim($xml->Definition['image']);
            $model->def_attr_type=self::trim($xml->Definition['type']);
            $model->def_attr_c1=self::trim($xml->Definition['c1']);
            $model->def_attr_c2=self::trim($xml->Definition['c2']);
            $model->def_attr_c3=self::trim($xml->Definition['c3']);
            $model->def_attr_c4=self::trim($xml->Definition['c4']);
            $model->def_miseo_name=self::trim($xml->Definition->StripName);
            $model->def_strip_status_id=(int)$xml->Definition->StripStatus;
            $model->def_rank=self::trim($xml->Definition->Rank);
            $model->def_lat_center=self::trim($xml->Definition->StripCenter->Latitude);
            $model->def_lon_center=self::trim($xml->Definition->StripCenter->Longitude);
            $model->def_strip_length=self::trim($xml->Definition->StripLength);
            $model->def_strip_width=self::trim($xml->Definition->StripWidth);
            $model->def_lat_corner_nw=self::trim($xml->Definition->CornerNW->Latitude);
            $model->def_lon_corner_nw=self::trim($xml->Definition->CornerNW->Longitude);
            $model->def_lat_corner_ne=self::trim($xml->Definition->CornerNE->Latitude);
            $model->def_lon_corner_ne=self::trim($xml->Definition->CornerNE->Longitude);
            $model->def_lat_corner_se=self::trim($xml->Definition->CornerSE->Latitude);
            $model->def_lon_corner_se=self::trim($xml->Definition->CornerSE->Longitude);
            $model->def_lat_corner_sw=self::trim($xml->Definition->CornerSW->Latitude);
            $model->def_lon_corner_sw=self::trim($xml->Definition->CornerSW->Longitude);
            
            //data
            $model->scene_id=$data->scene_id;
 
            if($model->save()){
                if($xml->Passes>0){
                    StripAccessLocal::insertBySplitted($xml->Passes,$model->id, $data->scene_id);
                }
            }else{
                Yii::$app->getSession()->setFlash('error','Splitted strip local import error.');
                return null;
            }
            //echo '<pre>'.print_r($model->attributes,true).'</pre>';
        }
    }
    
    public static function trim($data){
        return MissionLocal::trim($data);
    }
    public static function sattellite($data){
        return MissionLocal::satellite($data);
    }
    public static function phase($data){
        return MissionLocal::phase($data);
    }
}
