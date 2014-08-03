<?php
/*
 * 2014-08-03
 * konkeanweb@gmail.com
 */
namespace app\models;

use common\models\PlanLocal as CPlanLocal;
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
            $model->save();
            return $model->id;
        }
        return null;
    }
}

