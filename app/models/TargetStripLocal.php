<?php
/*
 * 2014-08-04
 * konkeanweb@gmail.com
 */
namespace app\models;

use common\models\TargetStripLocal as CTargetStripLocal;
class TargetStripLocal extends CTargetStripLocal{
    public static function insertGetId($data,$ref=null){
        if(is_object($data)){
            //echo '<pre>' . print_r($data, true) . '</pre>';
            $model=new self;
            
            $model->attr_name=(string)$data['name'];
            $model->attr_status=(string)$data['status'];
            $model->attr_type=(string)$data['type'];
            $model->attr_image=(string)$data['image'];
            $model->attr_c1=(int)$data['c1'];
            $model->attr_c2=(int)$data['c2'];
            $model->attr_c3=(int)$data['c3'];
            $model->attr_c4=(int)$data['c4'];
            
            $model->miseo_reference=(string)$data->DatabaseData->ReferenceMiseo;
            $model->miseo_group=(string)$data->DatabaseData->Group;
            $model->miseo_template=(string)$data->DatabaseData->Template;
            $model->satellite=(string)trim($data->DatabaseData->TgtSatellite);
            $model->phase=(string)trim($data->DatabaseData->TgtOrbitPhase);
            $model->rev_no=(string)$data->DatabaseData->RevNumber;
            $model->plan_id=(string)$data->DatabaseData->PlanId;
            
            $model->target_status_id=(int)$data->Status;
            $model->lat_center=(string)$data->TgtCenter->Latitude;
            $model->lon_center=(string)$data->TgtCenter->Longitude;
            $model->altitude_center=(string)$data->TgtCenter->Altitude;
            
            $model->strip_length=(string)$data->TglLength;
            $model->strip_width=(string)$data->TglWidth;
            
            $model->lat_corner_nw=(string)$data->CornerNW->Latitude;
            $model->lon_corner_nw=(string)$data->CornerNW->Longitude;
            $model->altitude_nw=(string)$data->CornerNW->Altitude;
            
            $model->lat_corner_ne=(string)$data->CornerNE->Latitude;
            $model->lon_corner_ne=(string)$data->CornerNE->Longitude;
            $model->altitude_ne=(string)$data->CornerNE->Altitude;
            
            $model->lat_corner_se=(string)$data->CornerSE->Latitude;
            $model->lon_corner_se=(string)$data->CornerSE->Longitude;
            $model->altitude_se=(string)$data->CornerSE->Altitude;
            
            $model->lat_corner_sw=(string)$data->CornerSW->Latitude;
            $model->lon_corner_sw=(string)$data->CornerSW->Longitude;
            $model->altitude_sw=(string)$data->CornerSW->Altitude;
            
            $model->gain1=(string)trim($data->GAIN1);
            $model->gain2=(string)trim($data->GAIN2);
            $model->gain3=(string)trim($data->GAIN3);
            $model->gain4=(string)trim($data->GAIN4);
            
            $model->filenb=(int)$data->File;
            
            if($ref){
                $model->trial_local_id=$ref;
            }
            
            $model->save();
            //print_r($model->errors);
            //echo '<pre>' . print_r($model->attributes, true) . '</pre>';
            return $model->id;
        }
        return null;
    }
}

