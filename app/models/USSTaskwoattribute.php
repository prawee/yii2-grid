<?php

/*
 * 2014-07-20
 * prawee@hotmail.com
 */

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class USSTaskwoattribute extends ActiveRecord {

    public static function getDb() {
        return Yii::$app->db2;
    }

    public static function tableName() {
        return 'task_wo_attribute';
    }

    public static function primaryKey() {
        return ['scene_id'];
    }

}
