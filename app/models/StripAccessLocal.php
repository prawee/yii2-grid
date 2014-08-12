<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\StripAccessLocal as CStripAccessLocal;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use app\models\MissionLocal;
class StripAccessLocal extends CStripAccessLocal{
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created','modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function insertBySplitted($data,$splittedId,$sceneId){
        //self::deleteAll(['splitted_strip_local_id'=>$id]);
        //echo '<pre>'.print_r($data,true).'</pre>';
        foreach($data as $values){
            foreach($values as $key=>$value){
                if(isset($value['DBTable'])){
                    //echo '<pre>'.print_r($value,true).'</pre>';
                    $model=new self;
                    $model->splitted_strip_local_id=(int)$splittedId;
                    $model->attr_status=self::trim($value['status']);
                    $model->attr_type=self::trim($value['type']);
                    $model->attr_image=self::trim($value['image']);
                    $model->attr_name=self::trim($value['name']);
                    $model->miseo_reference=self::trim($value->DbData->Ref);
                    $model->miseo_group=self::trim($value->DbData->Grp);
                    $model->miseo_template=self::trim($value->DbData->Tmpl);
                    $model->orbit_cycle=self::trim($value->Orbit);
                    $model->orbit_cycle_couple=self::trim($value->Couple);
                    $model->roll_max_access=self::trim($value->RollMax);
                    $model->earliest_date=self::datetime($value->EarliestDate);
                    $model->scene_id=(int)$sceneId;
                    
                    if($model->roll_max_access!=0){
                        $model->save();
                    }
                    //echo '<pre>'.print_r($model->attributes,true).'</pre>';
                }
            }
        }
    }
    public static function trim($data){
        return MissionLocal::trim($data);
    }

    public static function date($date){
        return MissionLocal::date($date);
    }
    public static function datetime($date){
        return MissionLocal::datetime($date);
    }
}

