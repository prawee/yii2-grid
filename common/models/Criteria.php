<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "criteria".
 *
 * @property integer $id
 * @property string $updatable_gains
 * @property string $sensor_type
 * @property string $nadir_viewing
 * @property string $compression_ratio
 * @property string $luminosity
 *
 * @property MissionLocal[] $missionLocals
 */
class Criteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updatable_gains', 'sensor_type', 'nadir_viewing', 'compression_ratio', 'luminosity'], 'required'],
            [['updatable_gains', 'sensor_type', 'nadir_viewing', 'compression_ratio', 'luminosity'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'updatable_gains' => 'Updatable Gains',
            'sensor_type' => 'Sensor Type',
            'nadir_viewing' => 'Nadir Viewing',
            'compression_ratio' => 'Compression Ratio',
            'luminosity' => 'Luminosity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['criteria_id' => 'id']);
    }
}
