<?php
/*
 * 20140724
 * prawee@hotmail.com
 */
namespace app\models;

//use Yii;
use common\models\Xml as CXml;
class Xml extends CXml{
    public function rules() {
        return [
            [['name'], 'file', 'extensions' =>'xml'],
            [['user_id', 'scene_id', 'status'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255]
        ];
    }
}
