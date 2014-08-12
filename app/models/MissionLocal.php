<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use Yii;
use common\models\MissionLocal as CMissionLocal;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


class MissionLocal extends CMissionLocal{
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
    public static function insertGetId2($xml,$data,$groupId=null,$xmlId=null){
        //echo '<pre>'.print_r($data->attributes,true).'</pre>';
        //echo '<pre>'.print_r($xml,true).'</pre>';
        
        //delete old data
        //self::deleteAll(['scene_id'=>$data->scene_id]);
        
        //import
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
                $model->dbd_periodicity_flag=null;
                $model->dbd_stereo_type=self::stereoType($xml->DatabaseData->StereoType);
                $model->dbd_organism=self::trim($xml->DatabaseData->Organism);
                $model->dbd_nb_summits_cov=self::trim($xml->DatabaseData->StripNb);
                
                //program zone
                $model->pgz_attr_name=self::trim($xml->ProgZone['name']);
                $model->pgz_attr_image=self::trim($xml->ProgZone['image']);;
                $model->pgz_attr_type=self::trim($xml->ProgZone['type']);;
                $model->pgz_attr_c1=self::trim($xml->ProgZone['c1']);;
                $model->pgz_attr_c2=self::trim($xml->ProgZone['c2']);;
                $model->pgz_attr_c3=self::trim($xml->ProgZone['c3']);;
                $model->pgz_attr_c4=self::trim($xml->ProgZone['c4']);;
                $model->pgz_miseo_name=self::trim($xml->ProgZone->ReqName);
                $model->pgz_request_status_id=self::trim($xml->ProgZone->ReqStatus);
                $model->pgz_satellite=self::satellite($xml->ProgZone->ReqSatellite);
                $model->pgz_phase=self::phase($xml->ProgZone->ReqOrbitPhase);
                $model->pgz_downlink_station_id=self::downlinkstation($xml->ProgZone->DownLinkStation);
                $model->pgz_average_altitude=self::trim($xml->ProgZone->AvgAltitude);
                $model->pgz_miseo_template=self::trim($xml->ProgZone->ZoneType);
                $model->pgz_center_latitude=self::trim($xml->ProgZone->ReqCenter->Latitude);
                $model->pgz_center_longitude=self::trim($xml->ProgZone->ReqCenter->Longitude);
                $model->pgz_nb_summits_cov;
                $model->pgz_item_length=self::trim($xml->ProgZone->ReqLength);

                //definition
                $model->def_attr_name=self::trim($xml->Definition['name']);
                $model->def_attr_image=self::trim($xml->Definition['image']);
                $model->def_attr_type=self::trim($xml->Definition['type']);
                $model->def_attr_c1=self::trim($xml->Definition['c1']);
                $model->def_attr_c2=self::trim($xml->Definition['c2']);
                $model->def_attr_c3=self::trim($xml->Definition['c3']);
                $model->def_attr_c4=self::trim($xml->Definition['c4']);
                $model->def_id_user=self::trim($xml->Definition->Id);
                $model->def_user_coordinates=self::trim($xml->Definition->Coordinates);
                $model->def_miseo_comment=self::trim($xml->Definition->Comment);
                $model->def_deposit_date=self::datetime($xml->Definition->DepositDate);
                $model->def_start_date=self::date($xml->Definition->StartDate);
                $model->def_end_date=self::date($xml->Definition->EndDate);
                $model->def_completion_date=self::datetime($xml->Definition->CompletionDate);
                $model->def_priority_id=(int)$xml->Definition->Priority;
                if($xml->Definition->Periodicity){
                    $model->def_periodicity_flag=self::periodicity($xml->Definition->Periodicity);
                    $model->def_periodicity_period=self::trim($xml->Definition->Periodicity->Periodic->Period);
                    $model->def_periodicity_min_delay_between_shots=self::trim($xml->Definition->Periodicity->Periodic->Delay);
                }
    
                //criteria
                $model->cri_attr_name=self::trim($xml->Criteria['name']);
                $model->cri_attr_image=self::trim($xml->Criteria['image']);
                $model->cri_attr_type=self::trim($xml->Criteria['type']);
                $model->cri_attr_c1=self::trim($xml->Criteria['c1']);
                $model->cri_attr_c2=self::trim($xml->Criteria['c2']);
                $model->cri_attr_c3=self::trim($xml->Criteria['c3']);
                $model->cri_attr_c4=self::trim($xml->Criteria['c4']);
                $model->cri_updatable_gains=self::trim($xml->Criteria->UpdatableGAINS);
                $model->cri_sensor_type=(int)$xml->Criteria->SensorType;
                $model->cri_sensor_type_bgain=self::sensortype($xml,'bgain');
                $model->cri_sensor_type_ggain=self::sensortype($xml,'ggain');
                $model->cri_sensor_type_rgain=self::sensortype($xml,'rgain');
                $model->cri_sensor_type_irgain=self::sensortype($xml,'irgain');
                $model->cri_sensor_type_gain=self::sensortype($xml,'gain');
                $model->cri_nadir_viewing=self::perfordomain($xml,'name');
                $model->cri_nadir_min_roll=self::perfordomain($xml,'min_roll');
                $model->cri_nadir_max_roll=self::perfordomain($xml,'max_roll');
                $model->cri_nadir_min_pitch=self::perfordomain($xml,'min_pitch');
                $model->cri_nadir_max_pitch=self::perfordomain($xml,'max_pitch');
                $model->cri_compression_ratio=self::trim($xml->Criteria->Compression);
                $model->cri_luminosity=self::trim($xml->Criteria->Luminosity);
 
                
                //xml data
                $model->created_by_id=Yii::$app->user->identity->id;
                $model->distributor_id=$data->distributor_id;
                $model->client_id=$data->client_id;
                $model->scene_id=$data->scene_id;
                $model->miseo_group_local_id=$groupId;
                $model->xml_id=$xmlId;
                
                if($model->save()){
                    return $model->id;
                }else{
                    Yii::$app->getSession()->setFlash('error','Mission import error.');
                    return null;
                    //echo '<pre>'.print_r($model->errors,true).'</pre>';
                }
                //echo '<pre>'.print_r($model->attributes,true).'</pre>';
            }
        }
    }
    public static function trim($data){
        return (string)trim($data);
    }
    public static function stereoType($data){
        return isset($data)?'Z':null;
    }
    public static function satellite($data){
        return $data==0?'Theos 1':null;
    }

    public static function phase($data){
        return $data==0?'Ascending':'Descending';
    }
    public static function periodicity($data){
        return $data=='N'?'Single Shot':'Y';
    }
    public static function datetime($date){
        return date('Y-m-d H:i:s',strtotime($date));
    }
    public static function date($date){
        return date('Y-m-d',strtotime($date));
    }
    public static function sensortype($data,$type){
        
        switch($data->Criteria->SensorType){
           case 1: 
               $out='MULTISPECTRAL';   
               $name='MULTISPECTRAL';
               break;
           case 2: 
               $out='MSPAN';  
               $name='MS+PAN';
               break;
           default: 
               $out='PANCHROMATIC';  
               $name='PANCHROMATIC';
               break;
        }
        if($type=='name'){ return $name;}
        if($type=='gain'){ return self::trim($data->Criteria->SensorType->{$out}->Gain);}
        if($type=='bgain'){ return self::trim($data->Criteria->SensorType->{$out}->BGain);}
        if($type=='ggain'){ return self::trim($data->Criteria->SensorType->{$out}->GGain);}
        if($type=='rgain'){ return self::trim($data->Criteria->SensorType->{$out}->RGain);}
        if($type=='irgain'){ return self::trim($data->Criteria->SensorType->{$out}->IRGain);}
        
    }
    public static function perfordomain($data,$type){
        switch($data->Criteria->PerfoDomain){
           case 'Y': 
               $out='Nardir';   
               break;
           case 'N': 
               $out='Nominal';  
               break;
           case 'F':
               $out='Full';
               break;
           default: 
               $out='User';  
               break;
        }
        if($type=='name'){ return self::trim($data->Criteria->PerfoDomain[0]); }
        if($type=='min_roll'){ return self::trim($data->Criteria->PerfoDomain->{$out}->MinimumRoll); }
        if($type=='max_roll'){ return self::trim($data->Criteria->PerfoDomain->{$out}->MaximumRoll); }
        if($type=='min_pitch'){ return self::trim($data->Criteria->PerfoDomain->{$out}->MinimumPitch); }
        if($type=='max_pitch'){ return self::trim($data->Criteria->PerfoDomain->{$out}->MaximumPitch); }
    }
    public static function downlinkstation($data){
        return $data!=0?(int)$data:null;
    }
}
