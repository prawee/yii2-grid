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
            [['name'], 'required'],
            [['name'], 'file', 'extensions' =>'xml'],
            [['client_id', 'scene_id', 'status','xml_type_id','distributor_id'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255]
        ];
    }
}
