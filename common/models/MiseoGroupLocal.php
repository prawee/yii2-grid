<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "miseo_group_local".
 *
 * @property integer $id
 * @property string $name
 * @property string $version
 * @property string $type
 * @property integer $databasedata_id
 * @property integer $groupzone_id
 * @property integer $scene_id
 *
 * @property Groupzone $groupzone
 * @property Databasedata $databasedata
 */
class MiseoGroupLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'miseo_group_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['databasedata_id', 'groupzone_id', 'scene_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['version', 'type'], 'string', 'max' => 45],
            [['scene_id'], 'unique']
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
            'version' => 'Version',
            'type' => 'Type',
            'databasedata_id' => 'Databasedata ID',
            'groupzone_id' => 'Groupzone ID',
            'scene_id' => 'Scene ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupzone()
    {
        return $this->hasOne(Groupzone::className(), ['id' => 'groupzone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatabasedata()
    {
        return $this->hasOne(Databasedata::className(), ['id' => 'databasedata_id']);
    }
}
