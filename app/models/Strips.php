<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Strips as CStrips;
class Strips extends CStrips{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        $model=new self;
        $model->miseo_name=(string)$data->StripName;
        $model->rank=(int)$data->Rank;
        $model->lat_center=isset($data->StripCenter->Latitude)?(string)$data->StripCenter->Latitude:null;
        $model->lon_center=isset($data->StripCenter->Longitude)?(string)$data->StripCenter->Longitude:null;
        $model->strip_length=isset($data->StripLength)?(string)$data->StripLength:null;
        $model->strip_width=isset($data->StripWidth)?(string)$data->StripWidth:null;
        $model->lat_corner_nw=isset($data->CornerNW->Latitude)?(string)$data->CornerNW->Latitude:null;
        $model->lon_corner_nw=isset($data->CornerNW->Longitude)?(string)$data->CornerNW->Longitude:null;
        $model->lat_corner_ne=isset($data->CornerNE->Latitude)?(string)$data->CornerNE->Latitude:null;
        $model->lon_corner_ne=isset($data->CornerNE->Longitude)?(string)$data->CornerNE->Longitude:null;
        $model->lat_corner_se=isset($data->CornerSE->Latitude)?(string)$data->CornerSE->Latitude:null;
        $model->lon_corner_se=isset($data->CornerSE->Longitude)?(string)$data->CornerSE->Longitude:null;
        $model->lat_corner_sw=isset($data->CornerSW->Latitude)?(string)$data->CornerSW->Latitude:null;
        $model->lon_corner_sw=isset($data->CornerSW->Longitude)?(string)$data->CornerSW->Longitude:null;
        $model->strip_status_id=(int)$data->StripStatus;
        $model->save(false);
    }

    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->miseo_name=(string)$data->StripName;
            $model->rank=(int)$data->Rank;
            $model->lat_center=isset($data->StripCenter->Latitude)?(string)$data->StripCenter->Latitude:null;
            $model->lon_center=isset($data->StripCenter->Longitude)?(string)$data->StripCenter->Longitude:null;
            $model->strip_length=isset($data->StripLength)?(string)$data->StripLength:null;
            $model->strip_width=isset($data->StripWidth)?(string)$data->StripWidth:null;
            $model->lat_corner_nw=isset($data->CornerNW->Latitude)?(string)$data->CornerNW->Latitude:null;
            $model->lon_corner_nw=isset($data->CornerNW->Longitude)?(string)$data->CornerNW->Longitude:null;
            $model->lat_corner_ne=isset($data->CornerNE->Latitude)?(string)$data->CornerNE->Latitude:null;
            $model->lon_corner_ne=isset($data->CornerNE->Longitude)?(string)$data->CornerNE->Longitude:null;
            $model->lat_corner_se=isset($data->CornerSE->Latitude)?(string)$data->CornerSE->Latitude:null;
            $model->lon_corner_se=isset($data->CornerSE->Longitude)?(string)$data->CornerSE->Longitude:null;
            $model->lat_corner_sw=isset($data->CornerSW->Latitude)?(string)$data->CornerSW->Latitude:null;
            $model->lon_corner_sw=isset($data->CornerSW->Longitude)?(string)$data->CornerSW->Longitude:null;
            $model->strip_status_id=(int)$data->StripStatus;
            $model->save();
            //print_r($model->errors);
        }
    }
}

