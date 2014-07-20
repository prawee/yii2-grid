<?php
/*
 * 2014-07-20
 * prawee@hotmail.com
 */
namespace app\models;

use yii\db\ActiveRecord;
class USSWo extends ActiveRecord{
    public static function getDb() {
        return $this->get('db3');
    }
}