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
        echo '<pre>'.print_r($data,true).'</pre>';
        foreach($data as $values){
            foreach($values as $key=>$value){
                if(isset($value['DBTable'])){
                    //echo '<pre>'.print_r($value,true).'</pre>';
                    $model=new self;
                    $model->splitted_strip_local_id=(int)$splittedId;
                    $model->miseo_reference=(string)$value->DbData->Ref;
                    $model->miseo_group=(string)$value->DbData->Grp;
                    $model->miseo_template=(string)$value->DbData->Tmpl;
                    $model->orbit_cycle=(string)$value->Orbit;
                    $model->orbit_cycle_couple=(string)$value->Couple;
                    $model->roll_max_access=(string)$value->RollMax;
                    $model->earliest_date=(string)$value->EasliestDate;
                    $model->scene_id=(int)$sceneId;
                    
                    if($model->roll_max_access!=0){
                        $model->save();
                    }
                }
            }
        }
        exit;
    }
}

