<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Groupzone as CGroupzone;
class Groupzone extends CGroupzone{
    public static function insertNullGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
    public static function insertGetId($data){
        $model=new self;
        $model->miseo_name=(string)$data->GroupName;
        $model->info_1=(string)$data->info_1;
        $model->info_2=(string)$data->info_2;
        $model->info_3=(string)$data->info_3;
        $model->info_4=(string)$data->info_4;
        $model->save();
        return $model->id;
    }

    public static function updateXML($data,$id){
        $model = self::findOne($id);
        if($model->id){
            $model->miseo_name=(string)$data->GroupName;
            $model->info_1=(string)$data->info_1;
            $model->info_2=(string)$data->info_2;
            $model->info_3=(string)$data->info_3;
            $model->info_4=(string)$data->info_4;
            $model->save();
        }
    }
}
