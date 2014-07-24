<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Criteria as CCriteria;
class Criteria extends CCriteria{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}

