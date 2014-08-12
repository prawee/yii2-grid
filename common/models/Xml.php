<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xml".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $client_id
 * @property integer $scene_id
 * @property integer $status
 * @property integer $xml_type_id
 * @property integer $distributor_id
 *
 * @property MissionLocal[] $missionLocals
 * @property User $distributor
 * @property User $client
 */
class Xml extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xml';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['client_id', 'scene_id', 'status', 'xml_type_id', 'distributor_id'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'path' => 'Path',
            'client_id' => 'Client ID',
            'scene_id' => 'Scene ID',
            'status' => 'Status',
            'xml_type_id' => 'Xml Type ID',
            'distributor_id' => 'Distributor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['xml_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(User::className(), ['id' => 'distributor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }
}
