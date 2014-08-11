<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mission_local".
 *
 * @property integer $id
 * @property string $attr_version
 * @property string $attr_image
 * @property string $attr_type
 * @property string $attr_status
 * @property string $attr_lock
 * @property string $attr_name
 * @property string $name
 * @property string $dbd_miseo_reference
 * @property string $dbd_miseo_group
 * @property string $dbd_periodicity_flag
 * @property string $dbd_stereo_type
 * @property integer $dbd_organism
 * @property integer $dbd_nb_summits_cov
 * @property string $pgz_attr_name
 * @property string $pgz_attr_image
 * @property string $pgz_attr_type
 * @property string $pgz_attr_c1
 * @property string $pgz_attr_c2
 * @property string $pgz_attr_c3
 * @property string $pgz_attr_c4
 * @property string $pgz_miseo_name
 * @property integer $pgz_request_status_id
 * @property string $pgz_satellite
 * @property string $pgz_phase
 * @property integer $pgz_downlink_station_id
 * @property integer $pgz_average_altitude
 * @property string $pgz_miseo_template
 * @property string $pgz_center_latitude
 * @property string $pgz_center_longitude
 * @property integer $pgz_nb_summits_cov
 * @property integer $pgz_item_length
 * @property string $def_attr_name
 * @property string $def_attr_image
 * @property string $def_attr_type
 * @property string $def_attr_c1
 * @property string $def_attr_c2
 * @property string $def_attr_c3
 * @property string $def_attr_c4
 * @property integer $def_id_user
 * @property string $def_user_coordinates
 * @property string $def_miseo_comment
 * @property string $def_deposit_date
 * @property string $def_start_date
 * @property string $def_end_date
 * @property string $def_completion_date
 * @property integer $def_priority_id
 * @property string $def_periodicity_flag
 * @property integer $def_periodicity_period
 * @property integer $def_periodicity_min_delay_between_shots
 * @property string $cri_attr_name
 * @property string $cri_attr_image
 * @property string $cri_attr_type
 * @property string $cri_attr_c1
 * @property string $cri_attr_c2
 * @property string $cri_attr_c3
 * @property string $cri_attr_c4
 * @property string $cri_updatable_gains
 * @property integer $cri_sensor_type
 * @property string $cri_sensor_type_bgain
 * @property string $cri_sensor_type_ggain
 * @property string $cri_sensor_type_rgain
 * @property string $cri_sensor_type_irgain
 * @property string $cri_sensor_type_gain
 * @property string $cri_nadir_viewing
 * @property string $cri_nadir_min_roll
 * @property string $cri_nadir_max_roll
 * @property string $cri_nadir_min_pitch
 * @property string $cri_nadir_max_pitch
 * @property integer $cri_compression_ratio
 * @property string $cri_luminosity
 * @property string $created
 * @property string $modified
 * @property integer $created_by_id
 * @property integer $midified_by_id
 * @property integer $distributor_id
 * @property integer $client_id
 * @property integer $status
 * @property integer $scene_id
 *
 * @property User $client
 * @property User $createdBy
 * @property User $distributor
 * @property DownlinkStation $pgzDownlinkStation
 * @property User $midifiedBy
 * @property RequestStatus $pgzRequestStatus
 * @property Scene $scene
 * @property SomPolygonLocal[] $somPolygonLocals
 * @property SplittedStripLocal[] $splittedStripLocals
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
            [['dbd_miseo_group', 'def_miseo_comment'], 'string'],
            [['dbd_organism', 'dbd_nb_summits_cov', 'pgz_request_status_id', 'pgz_downlink_station_id', 'pgz_average_altitude', 'pgz_nb_summits_cov', 'pgz_item_length', 'def_id_user', 'def_priority_id', 'def_periodicity_period', 'def_periodicity_min_delay_between_shots', 'cri_sensor_type', 'cri_compression_ratio', 'created_by_id', 'midified_by_id', 'distributor_id', 'client_id', 'status', 'scene_id'], 'integer'],
            [['pgz_center_latitude', 'pgz_center_longitude', 'cri_nadir_min_roll', 'cri_nadir_max_roll', 'cri_nadir_min_pitch', 'cri_nadir_max_pitch'], 'number'],
            [['def_deposit_date', 'def_start_date', 'def_end_date', 'def_completion_date', 'created', 'modified'], 'safe'],
            [['attr_version', 'attr_image', 'attr_type', 'attr_status', 'attr_lock', 'attr_name', 'pgz_attr_image', 'pgz_attr_type', 'pgz_attr_c1', 'pgz_attr_c2', 'pgz_attr_c3', 'pgz_attr_c4', 'pgz_satellite', 'def_attr_image', 'def_attr_type', 'def_attr_c1', 'def_attr_c2', 'def_attr_c3', 'def_attr_c4', 'cri_attr_name', 'cri_attr_image', 'cri_attr_type', 'cri_attr_c1', 'cri_attr_c2', 'cri_attr_c3', 'cri_attr_c4'], 'string', 'max' => 45],
            [['name', 'dbd_miseo_reference', 'pgz_attr_name', 'pgz_miseo_name'], 'string', 'max' => 255],
            [['dbd_periodicity_flag', 'dbd_stereo_type', 'def_periodicity_flag', 'cri_updatable_gains', 'cri_nadir_viewing', 'cri_luminosity'], 'string', 'max' => 1],
            [['pgz_phase', 'pgz_miseo_template', 'def_attr_name', 'def_user_coordinates'], 'string', 'max' => 128],
            [['cri_sensor_type_bgain', 'cri_sensor_type_ggain', 'cri_sensor_type_rgain', 'cri_sensor_type_irgain', 'cri_sensor_type_gain'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attr_version' => 'Attr Version',
            'attr_image' => 'Attr Image',
            'attr_type' => 'Attr Type',
            'attr_status' => 'Attr Status',
            'attr_lock' => 'Attr Lock',
            'attr_name' => 'Attr Name',
            'name' => 'Name',
            'dbd_miseo_reference' => 'Dbd Miseo Reference',
            'dbd_miseo_group' => 'Dbd Miseo Group',
            'dbd_periodicity_flag' => 'Dbd Periodicity Flag',
            'dbd_stereo_type' => 'Dbd Stereo Type',
            'dbd_organism' => 'Dbd Organism',
            'dbd_nb_summits_cov' => 'Dbd Nb Summits Cov',
            'pgz_attr_name' => 'Pgz Attr Name',
            'pgz_attr_image' => 'Pgz Attr Image',
            'pgz_attr_type' => 'Pgz Attr Type',
            'pgz_attr_c1' => 'Pgz Attr C1',
            'pgz_attr_c2' => 'Pgz Attr C2',
            'pgz_attr_c3' => 'Pgz Attr C3',
            'pgz_attr_c4' => 'Pgz Attr C4',
            'pgz_miseo_name' => 'Pgz Miseo Name',
            'pgz_request_status_id' => 'Pgz Request Status ID',
            'pgz_satellite' => 'Pgz Satellite',
            'pgz_phase' => 'Pgz Phase',
            'pgz_downlink_station_id' => 'Pgz Downlink Station ID',
            'pgz_average_altitude' => 'Pgz Average Altitude',
            'pgz_miseo_template' => 'Pgz Miseo Template',
            'pgz_center_latitude' => 'Pgz Center Latitude',
            'pgz_center_longitude' => 'Pgz Center Longitude',
            'pgz_nb_summits_cov' => 'Pgz Nb Summits Cov',
            'pgz_item_length' => 'Pgz Item Length',
            'def_attr_name' => 'Def Attr Name',
            'def_attr_image' => 'Def Attr Image',
            'def_attr_type' => 'Def Attr Type',
            'def_attr_c1' => 'Def Attr C1',
            'def_attr_c2' => 'Def Attr C2',
            'def_attr_c3' => 'Def Attr C3',
            'def_attr_c4' => 'Def Attr C4',
            'def_id_user' => 'Def Id User',
            'def_user_coordinates' => 'Def User Coordinates',
            'def_miseo_comment' => 'Def Miseo Comment',
            'def_deposit_date' => 'Def Deposit Date',
            'def_start_date' => 'Def Start Date',
            'def_end_date' => 'Def End Date',
            'def_completion_date' => 'Def Completion Date',
            'def_priority_id' => 'Def Priority ID',
            'def_periodicity_flag' => 'Def Periodicity Flag',
            'def_periodicity_period' => 'Def Periodicity Period',
            'def_periodicity_min_delay_between_shots' => 'Def Periodicity Min Delay Between Shots',
            'cri_attr_name' => 'Cri Attr Name',
            'cri_attr_image' => 'Cri Attr Image',
            'cri_attr_type' => 'Cri Attr Type',
            'cri_attr_c1' => 'Cri Attr C1',
            'cri_attr_c2' => 'Cri Attr C2',
            'cri_attr_c3' => 'Cri Attr C3',
            'cri_attr_c4' => 'Cri Attr C4',
            'cri_updatable_gains' => 'Cri Updatable Gains',
            'cri_sensor_type' => 'Cri Sensor Type',
            'cri_sensor_type_bgain' => 'Cri Sensor Type Bgain',
            'cri_sensor_type_ggain' => 'Cri Sensor Type Ggain',
            'cri_sensor_type_rgain' => 'Cri Sensor Type Rgain',
            'cri_sensor_type_irgain' => 'Cri Sensor Type Irgain',
            'cri_sensor_type_gain' => 'Cri Sensor Type Gain',
            'cri_nadir_viewing' => 'Cri Nadir Viewing',
            'cri_nadir_min_roll' => 'Cri Nadir Min Roll',
            'cri_nadir_max_roll' => 'Cri Nadir Max Roll',
            'cri_nadir_min_pitch' => 'Cri Nadir Min Pitch',
            'cri_nadir_max_pitch' => 'Cri Nadir Max Pitch',
            'cri_compression_ratio' => 'Cri Compression Ratio',
            'cri_luminosity' => 'Cri Luminosity',
            'created' => 'Created',
            'modified' => 'Modified',
            'created_by_id' => 'Created By ID',
            'midified_by_id' => 'Midified By ID',
            'distributor_id' => 'Distributor ID',
            'client_id' => 'Client ID',
            'status' => 'Status',
            'scene_id' => 'Scene ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by_id']);
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
    public function getPgzDownlinkStation()
    {
        return $this->hasOne(DownlinkStation::className(), ['id' => 'pgz_downlink_station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMidifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'midified_by_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPgzRequestStatus()
    {
        return $this->hasOne(RequestStatus::className(), ['id' => 'pgz_request_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScene()
    {
        return $this->hasOne(Scene::className(), ['id' => 'scene_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSomPolygonLocals()
    {
        return $this->hasMany(SomPolygonLocal::className(), ['mission_local_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplittedStripLocals()
    {
        return $this->hasMany(SplittedStripLocal::className(), ['mission_local_id' => 'id']);
    }
}
