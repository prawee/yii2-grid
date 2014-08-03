<?php

/*
 * 2014-07-20
 * prawee@hotmail.com
 */

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

class USSCustomer extends ActiveRecord {

    public static function getDb() {
        return Yii::$app->db3;
    }

    public static function tableName() {
        return 'customer';
    }

    public static function primaryKey() {
        return ['id'];
    }

}
