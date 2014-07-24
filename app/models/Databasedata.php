<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Databasedata as CDatabasedata;

class Databasedata extends CDatabasedata{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->name=(string)isset($data->Name);
            $model->miseo_reference=(string) isset($data->ReferenceMiseo);
            $model->miseo_group=(string) isset($data->Group);
            $model->miseo_template=(string)isset($data->Template);
            $model->nb_summits_cov=(int)isset($data->StripNb);
            $model->stereo_type=(string)isset($data->StereoType->NA);
            $model->organism=(string) isset($data->Organism);
            $model->delta_lat_north=isset($data->DeltaLatNorth)?(string)$data->DeltaLatNorth:null;
            $model->delta_lat_south=isset($data->DeltaLatSouth)?(string)$data->DeltaLatSouth:null;
            $model->save();
        }
    }
}
