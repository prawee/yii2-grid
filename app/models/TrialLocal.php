<?php

/*
 * 2014-08-04
 * konkeanweb@gmail.com
 */

namespace app\models;

use common\models\TrialLocal as CTrialLocal;

class TrialLocal extends CTrialLocal {

    public static function insertGetId($xmls) {
        if (is_object($xmls)) {
            foreach ($xmls as $key => $xml) {
                foreach ($xml as $keydata => $data) {
                    if ($data['DBTable']) {
                        //echo '<pre>' . print_r($data, true) . '</pre>';
                        $model = new self;
                        $model->attr_name = (string) $data['name'];
                        $model->attr_lock = (string) $data['lock'];
                        $model->attr_image = (string) $data['image'];
                        $model->attr_type = (string) $data['type'];
                        $model->attr_status = (string) $data['status'];

                        $model->miseo_reference=(string) $data->DatabaseData->ReferenceMiseo;
                        $model->miseo_group=(string)$data->DatabaseData->Group;
                        $model->miseo_template=(string)$data->DatabaseData->Template;
                        $model->medium_post_x=(string)$data->DatabaseData->Dx;
                        $model->medium_post_y=(string)$data->DatabaseData->Dy;
                        $model->medium_post_z=(string)$data->DatabaseData->Dz;
                        $model->plan_id=(string)$data->DatabaseData->PlanId;
                        
                        $model->trial_status_id=(int)$data->Definition->TrialStatus;
                        $model->satellite=(string)trim($data->Definition->TrialSatellite);
                        $model->start_acqu_date=(string)$model->getDateTime($data->Definition->StartAcqDate);
                        $model->stop_acqu_date=(string)$model->getDateTime($data->Definition->StopAcqDate);
                        $model->roll=(string)$data->Definition->Roll;
                        $model->pitch=(string)$data->Definition->Pitch;
                        $model->orbit_cycle=(int)$data->Definition->TrialOrbitCycle;
                        $model->luminosity=(string)trim($data->Definition->TrialLuminosity);
                        $model->cloud_coverage=(int)$data->Definition->CloudCoverage;
                        //echo '<pre>' . print_r($model->attributes, true) . '</pre>';
                        $model->save();
                        //print_r($model->errors);
                        //return $model->id;
                        
                        foreach($data->TargetArray as $keytargets=>$targets){
                            foreach($targets as $keytarget=>$target){
                                if($target['DBTable']){
                                    //echo '<pre>' . print_r($target, true) . '</pre>';
                                    TargetStripLocal::insertGetId($target,$model->id);
                                }
                            }
                        }
                        
                    }
                    
                }
            }
        }
        return null;
    }
    public function getDateTime($date){
        return date('Y-m-d H:i:s',strtotime($date));
    }
    public function getString($data){
        return trim($data);
    }
    public function getDate($date){
        return date('Y-m-d',strtotime($date));
    }

}
