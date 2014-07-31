<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Progzone as CProgzone;
use app\models\DownlinkStation;
class Progzone extends CProgzone{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        print_r($data); 
        $model=new self;
        $model->miseo_name=(string)$data->ReqName;
        $model->satellite=(int)$data->ReqSatellite;
        $model->phase=(int)$data->ReqOrbitPhase;
        $model->average_altitude=(int)$data->AvgAltitude;
        $model->miseo_template=(string) (isset($data->Template)?$data->Template:'|');
        $model->center_latitude=(float)isset($data->ReqCenter->Latitude);
        $model->center_longitude=(float)isset($data->ReqCenter->Longitude);
        $model->item_length=(int)$data->ReqLength;
        $model->zonetype=(string)$data->ZoneType;
        $model->request_status_id=(int)$data->ReqStatus;
        $model->downlink_station_id=(int)DownlinkStation::getIdByValue((int)$data->DownLinkStation);
        $model->save(false);
        return $model->id;
    }

    public static function updateXML($data,$id){
        //echo '<pre>'.print_r($data,true).'</pre>';
        $model = self::findOne($id);
        if($model->id){
            $model->miseo_name=(string)$data->ReqName;
            $model->satellite=(int)$data->ReqSatellite;
            $model->phase=(int)$data->ReqOrbitPhase;
            $model->average_altitude=(int)$data->AvgAltitude;
            $model->miseo_template=(string) (isset($data->Template)?$data->Template:'|');
            $model->center_latitude=(float)isset($data->ReqCenter->Latitude);
            $model->center_longitude=(float)isset($data->ReqCenter->Longitude);
            $model->item_length=(int)$data->ReqLength;
            $model->zonetype=(string)$data->ZoneType;
            $model->request_status_id=(int)$data->ReqStatus;
            $model->downlink_station_id=(int)DownlinkStation::getIdByValue((int)$data->DownLinkStation);
            $model->save();
            //print_r($model->errors);
        }
    }
}

