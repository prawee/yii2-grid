<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mission_local".
 *
 * @property integer $id
 * @property string $name
 * @property integer $databasedata_id
 * @property integer $progzone_id
 * @property integer $definition_id
 * @property integer $criteria_id
 * @property integer $scene_id
 * @property string $version
 * @property string $image
 * @property string $type
 * @property integer $status
 *
 * @property Criteria $criteria
 * @property Databasedata $databasedata
 * @property Definition $definition
 * @property Progzone $progzone
 */
class MissionLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mission_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['databasedata_id', 'progzone_id', 'definition_id', 'criteria_id', 'scene_id', 'status'], 'integer'],
            [['name', 'version', 'image', 'type'], 'string', 'max' => 45]
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
            'databasedata_id' => 'Databasedata Id',
            'progzone_id' => 'Progzone Id',
            'definition_id' => 'Definition Id',
            'criteria_id' => 'Criteria Id',
            'scene_id' => 'Scene Id',
            'version' => 'Version',
            'image' => 'Image',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteria()
    {
        return $this->hasOne(Criteria::className(), ['id' => 'criteria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatabasedata()
    {
        return $this->hasOne(Databasedata::className(), ['id' => 'databasedata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefinition()
    {
        return $this->hasOne(Definition::className(), ['id' => 'definition_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgzone()
    {
        return $this->hasOne(Progzone::className(), ['id' => 'progzone_id']);
    }
}
