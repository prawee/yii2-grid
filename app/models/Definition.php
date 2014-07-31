<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;
use common\models\Definition as CDefinition;
class Definition extends CDefinition{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        $model=new self;
        $model->user_id=(string) (isset($data->Id)?0:$data->Id);
        $model->user_coordinates=(string) (isset($data->Coordinates)?0:$data->Coordinates);
        $model->miseo_comment=(string)$data->Comment;
        $model->deposit_date=(string)$model->getDateTime($data->DepositDate);
        $model->start_date=(string)$model->getDateTime($data->StartDate);
        $model->end_date=(string)$model->getDateTime($data->EndDate);
        $model->completion_date=(string)$model->getDateTime($data->CompletionDate);
        $model->periodicity_flag=(string)$model->getString($data->Periodicity);
        $model->priority_id=(int)  Priority::getIdByValue((string)$data->Priority);
        $model->save(false);
        return $model->id;
    }

    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->user_id=(string) (isset($data->Id)?0:$data->Id);
            $model->user_coordinates=(string) (isset($data->Coordinates)?0:$data->Coordinates);
            $model->miseo_comment=(string)$data->Comment;
            $model->deposit_date=(string)$model->getDateTime($data->DepositDate);
            $model->start_date=(string)$model->getDateTime($data->StartDate);
            $model->end_date=(string)$model->getDateTime($data->EndDate);
            $model->completion_date=(string)$model->getDateTime($data->CompletionDate);
            $model->periodicity_flag=(string)$model->getString($data->Periodicity);
            $model->priority_id=(int)  Priority::getIdByValue((string)$data->Priority);
            $model->save();
            //print_r($model->errors);
        }
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
