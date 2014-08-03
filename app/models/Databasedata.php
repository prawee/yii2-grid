<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Databasedata as CDatabasedata;

class Databasedata extends CDatabasedata{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        if (is_object($data)) {
            $model = new self;
            $model->name = (string) $data->Name;
            $model->miseo_reference = (string) $data->ReferenceMiseo;
            $model->miseo_group = (string) $data->Group;
            $model->miseo_template = (string) $data->Template;
            $model->nb_summits_cov = (int) $data->StripNb;
            $model->stereo_type = (string) isset($data->StereoType->NA);
            $model->organism = (string) $data->Organism;
            $model->delta_lat_north = isset($data->DeltaLatNorth) ? (string) $data->DeltaLatNorth : null;
            $model->delta_lat_south = isset($data->DeltaLatSouth) ? (string) $data->DeltaLatSouth : null;
            
            if($data->StripSatellite){
                $model->strip_satellite=(int)$data->StripSatellite;
            }
            if($data->StripOrbitPhase){
                $model->strip_orbit_phase=(int)$data->StripOrbitPhase;
            }
            $model->save();
            return $model->id;
        }
        return null;
    }

    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->name=(string)$data->Name;
            $model->miseo_reference=(string)$data->ReferenceMiseo;
            $model->miseo_group=(string)$data->Group;
            $model->miseo_template=(string)$data->Template;
            $model->nb_summits_cov=(int)$data->StripNb;
            $model->stereo_type=(string)isset($data->StereoType->NA);
            $model->organism=(string) $data->Organism;
            $model->delta_lat_north=isset($data->DeltaLatNorth)?(string)$data->DeltaLatNorth:null;
            $model->delta_lat_south=isset($data->DeltaLatSouth)?(string)$data->DeltaLatSouth:null;
            $model->save();
        }
    }
}
