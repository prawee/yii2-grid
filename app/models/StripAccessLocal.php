<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\StripAccessLocal as CStripAccessLocal;
class StripAccessLocal extends CStripAccessLocal{
    public static function insertBySplitted($data,$id){
        //echo '<pre>'.print_r($data,true).'</pre>';
        foreach($data as $values){
            foreach($values as $key=>$value){
                if(isset($value['DBTable'])){
                    //echo '<pre>'.print_r($value,true).'</pre>';
                    $model=new self;
                    $model->miseo_reference=(string)$value->DbData->Ref;
                    $model->miseo_group=(string)$value->DbData->Grp;
                    $model->miseo_template=(string)$value->DbData->Tmpl;
                    $model->orbit_cycle=(string)$value->Orbit;
                    $model->orbit_cycle_couple=(string)$value->Couple;
                    $model->roll_max_access=(string)$value->RollMax;
                    $model->earliest_date=(string)$value->EasliestDate;
                    $model->splitted_strip_local_id=(int)$id;
                    $model->save();
                }
            }
        }
    }
}

