<?php

/*
 * 2014-07-20
 * prawee@hotmail.com
 */

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class USSWo extends ActiveRecord {

    public static function getDb() {
        return Yii::$app->db3;
    }

    public static function tableName() {
        return 'tpt_wo';
    }

    public static function primaryKey() {
        return ['id'];
    }

    public function getDepositDate() {
        $date = MissionLocal::find()->where(['scene_id' => $this->id])->one();
        return is_object($date) ? $date->definition->deposit_date : null;
    }

    public function getStripName() {
        $model = SplittedStripLocal::find()->where(['scene_id' => $this->id])->one();
        return is_object($model) ? $model->strips->miseo_name : null;
    }

    public function getRequestName() {
        $model = MiseoGroupLocal::find()->where(['scene_id' => $this->id])->one();
        return is_object($model) ? $model->name : null;
    }

    public function getCustomer() {
        $model = USSCustomer::find()->where(['id' => $this->customer_id])->one();
        return is_object($model) ? $model : null;
    }
    public function getWoattribute(){
        $model_task_wo_att = USSTaskwoattribute::findAll(['scene_id' => $this->id]);
        //$model_wo_att = USSWoattribute::find()->where(['id' => $model_task_wo_att->wo_attribute_id])->all();
        
        return is_object($model_task_wo_att) ? $model_task_wo_att : null;
    }

}
