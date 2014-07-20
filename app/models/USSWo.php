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
}