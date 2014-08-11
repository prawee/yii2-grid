<?php

/*
 * 20140724
 * prawee@hotmail.com
 */

namespace app\models;

//use Yii;
use common\models\Xml as CXml;

class Xml extends CXml {

    public function rules() {
        return [
            [['name','distributor_id','client_id'], 'required'],
            [['name'], 'file', 'extensions' => 'xml'],
            [['client_id', 'scene_id', 'status', 'xml_type_id', 'distributor_id'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'client_id' => 'Client',
            'scene_id' => 'Scene ID',
            'status' => 'Status',
            'xml_type_id' => 'Xml Type ID',
            'distributor_id' => 'Distributor',
        ];
    }

}
