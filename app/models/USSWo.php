<?php
/*
 * 2014-07-20
 * prawee@hotmail.com
 */
namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
class USSWo extends ActiveRecord{
    public static function getDb() {
        return Yii::$app->db3;
    }
    public static function tableName() {
        return 'tpt_wo';
    }
    public static function primaryKey() {
        return ['id'];
    }
    public function getDepositDate(){
        $date=MissionLocal::find()->where(['scene_id'=>$this->id])->one();
        if(is_object($date)){
            return $date->definition->deposit_date;
        }else{
            return null;
        } 
    }
}