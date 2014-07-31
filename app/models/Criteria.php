<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Criteria as CCriteria;
class Criteria extends CCriteria{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        $model=new self;
        $model->updatable_gains=(string)trim($data->UpdatableGAINS);
        $model->sensor_type=(string)trim($data->SensorType);
        $model->nadir_viewing=(string)trim($model->getString($data->PerfoDomain));
        $model->compression_ratio=(string)trim($data->Compression);
        $model->luminosity=(string)trim($model->getString($data->Luminosity));
        $model->save();
        return $model->id;
    }

    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->updatable_gains=(string)trim($data->UpdatableGAINS);
            $model->sensor_type=(string)trim($data->SensorType);
            $model->nadir_viewing=(string)trim($model->getString($data->PerfoDomain));
            $model->compression_ratio=(string)trim($data->Compression);
            $model->luminosity=(string)trim($model->getString($data->Luminosity));
            $model->save();
        }
    }
    public function getString($data){
        return trim($data);
    }
}

