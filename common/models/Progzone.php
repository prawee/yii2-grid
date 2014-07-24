<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "progzone".
 *
 * @property integer $id
 * @property string $miseo_name
 * @property integer $satellite
 * @property integer $phase
 * @property integer $average_altitude
 * @property string $miseo_template
 * @property double $center_latitude
 * @property double $center_longitude
 * @property integer $item_length
 * @property string $zonetype
 * @property integer $request_status_id
 * @property integer $downlink_station_id
 *
 * @property MissionLocal[] $missionLocals
 * @property DownlinkStation $downlinkStation
 * @property RequestStatus $requestStatus
 */
class Progzone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'progzone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['miseo_name', 'miseo_template', 'zonetype'], 'required'],
            [['satellite', 'phase', 'average_altitude', 'item_length', 'request_status_id', 'downlink_station_id'], 'integer'],
            [['center_latitude', 'center_longitude'], 'number'],
            [['miseo_name', 'miseo_template'], 'string', 'max' => 255],
            [['zonetype'], 'string', 'max' => 180]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'miseo_name' => 'Miseo Name',
            'satellite' => 'Satellite',
            'phase' => 'Phase',
            'average_altitude' => 'Average Altitude',
            'miseo_template' => 'Miseo Template',
            'center_latitude' => 'Center Latitude',
            'center_longitude' => 'Center Longitude',
            'item_length' => 'Item Length',
            'zonetype' => 'Zonetype',
            'request_status_id' => 'Request Status ID',
            'downlink_station_id' => 'Downlink Station ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['progzone_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownlinkStation()
    {
        return $this->hasOne(DownlinkStation::className(), ['id' => 'downlink_station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestStatus()
    {
        return $this->hasOne(RequestStatus::className(), ['id' => 'request_status_id']);
    }
}
