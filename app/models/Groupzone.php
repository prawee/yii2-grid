<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

use common\models\Groupzone as CGroupzone;
class Groupzone extends CGroupzone{
    public static function insertGetId(){
        $model=new self;
        $model->save(false);
        return $model->id;
    }
}
