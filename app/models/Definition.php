<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;
use common\models\Definition as CDefinition;
class Definition extends CDefinition{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}
