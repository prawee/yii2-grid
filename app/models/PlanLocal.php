<?php
/*
 * 2014-08-03
 * konkeanweb@gmail.com
 */
namespace app\models;

use common\models\PlanLocal as CPlanLocal;
use app\models\MissionLocal;

class PlanLocal extends CPlanLocal{
    public static function insertGetId($data){
        //echo '<pre>'.print_r($data,true).'</pre>';
        if(is_object($data)){
            $model=new self;
            if(is_object($data->DatabaseData)){
                $model->databasedata_id=(int) Databasedata::insertGetId($data->DatabaseData);
            }
            $model->name=(string)$data->Status->PlanName;
            $model->start_date=(string)$data->Status->StartDate;
            $model->end_date=(string)$data->Status->EndDate;
            $model->plan_status_id=(int)$data->Status->PlanStatus;
            
            $model->attr_version=(string)$data['version'];
            $model->attr_image=(string)$data['image'];
            $model->attr_key=(string)$data['key'];
            $model->attr_status=(string)$data['status'];
            $model->attr_type=(string)$data['type'];
            $model->attr_lock=(string)$data['lock'];
            //$model->save();
            //return $model->id;
            
            echo '<pre>'.print_r($model->attributes,true).'</pre>';
        }
        return null;
    }
    public static function insertGetId2($data){
        if(is_object($data) && $data['DBTable']=='PLAN_LOCAL'){
            echo '<pre>'.print_r($data->Status->NotDatabased->CufInfo,true).'</pre>';
            $model=new self;
            $model->attr_version=self::trim($data['version']);
            $model->attr_image=self::trim($data['image']);
            $model->attr_status=self::trim($data['status']);
            $model->attr_type=self::trim($data['type']);
            $model->attr_lock=self::trim($data['lock']);
            
            //databasedata
            $model->dbd_miseo_reference=self::trim($data->DatabaseData->ReferenceMiseo);
            $model->dbd_miseo_group=self::trim($data->DatabaseData->Group);
            $model->dbd_miseo_template=self::trim($data->DatabaseData->Template);
            
            //status
            $model->miseo_name=self::trim($data->Status->PlanName);
            $model->start_date=self::datetime($data->Status->StartDate);
            $model->end_date=self::datetime($data->Status->EndDate);
            $model->plan_status_id=(int)$data->Status->PlanStatus;
            $model->plan_date=self::date($data->Status->NotDatabased->Date);
            $model->info=self::trim($data->Status->NotDatabased->CufInfo->Info);
            $model->info1=self::datetime($data->Status->NotDatabased->CufInfo->Info1);
            $model->info2=self::datetime($data->Status->NotDatabased->CufInfo->Info2);

            if($model->save()){
                return $model->id;
            }else{
                Yii::$app->getSession()->setFlash('error','Plan local import error.');
                return null;
            }
            //echo '<pre>'.print_r($model->attributes,true).'</pre>';
        }
        //exit;
    }
    
    public static function trim($data){
        return MissionLocal::trim($data);
    }
    public static function date($date){
        return MissionLocal::date($date);
    }
    public static function datetime($date){
        return MissionLocal::datetime($date);
    }
    public static function strtodatetime($date){
        return date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',strtotime($date))));
    }
}

