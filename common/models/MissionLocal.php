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
            [['databasedata_id', 'progzone_id', 'definition_id', 'criteria_id', 'scene_id'], 'integer'],
            [['name'], 'string', 'max' => 45]
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
            'databasedata_id' => 'Databasedata ID',
            'progzone_id' => 'Progzone ID',
            'definition_id' => 'Definition ID',
            'criteria_id' => 'Criteria ID',
            'scene_id' => 'Scene ID',
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
