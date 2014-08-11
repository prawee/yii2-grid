<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "splitted_strip_local".
 *
 * @property integer $id
 * @property integer $mission_local_id
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_image
 * @property string $attr_lock
 * @property string $attr_name
 * @property string $dbd_miseo_reference
 * @property string $dbd_miseo_group
 * @property string $dbd_miseo_template
 * @property string $dbd_satellite
 * @property string $dbd_phase
 * @property string $dbd_delta_lat_north
 * @property string $dbd_delta_lat_south
 * @property string $def_attr_name
 * @property string $def_attr_image
 * @property string $def_attr_type
 * @property string $def_attr_c1
 * @property string $def_attr_c2
 * @property string $def_attr_c3
 * @property string $def_attr_c4
 * @property string $def_miseo_name
 * @property integer $def_strip_status_id
 * @property integer $def_rank
 * @property string $def_lat_center
 * @property string $def_lon_center
 * @property string $def_strip_length
 * @property string $def_strip_width
 * @property string $def_lat_corner_nw
 * @property string $def_lon_corner_nw
 * @property string $def_lat_corner_ne
 * @property string $def_lon_corner_ne
 * @property string $def_lat_corner_se
 * @property string $def_lon_corner_se
 * @property string $def_lat_corner_sw
 * @property string $def_lon_corner_sw
 * @property string $created
 * @property string $modified
 * @property integer $scene_id
 *
 * @property StripStatus $defStripStatus
 * @property MissionLocal $missionLocal
 * @property Scene $scene
 * @property StripAccessLocal[] $stripAccessLocals
 */
class SplittedStripLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'splitted_strip_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mission_local_id', 'def_strip_status_id', 'def_rank', 'scene_id'], 'integer'],
            [['dbd_miseo_group'], 'string'],
            [['dbd_delta_lat_north', 'dbd_delta_lat_south', 'def_lat_center', 'def_lon_center', 'def_strip_length', 'def_strip_width', 'def_lat_corner_nw', 'def_lon_corner_nw', 'def_lat_corner_ne', 'def_lon_corner_ne', 'def_lat_corner_se', 'def_lon_corner_se', 'def_lat_corner_sw', 'def_lon_corner_sw'], 'number'],
            [['created', 'modified'], 'safe'],
            [['attr_status', 'attr_type', 'attr_image', 'attr_lock', 'attr_name', 'dbd_miseo_template', 'dbd_satellite', 'dbd_phase', 'def_attr_image', 'def_attr_type', 'def_attr_c1', 'def_attr_c2', 'def_attr_c3', 'def_attr_c4'], 'string', 'max' => 45],
            [['dbd_miseo_reference', 'def_attr_name', 'def_miseo_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mission_local_id' => 'Mission Local ID',
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_image' => 'Attr Image',
            'attr_lock' => 'Attr Lock',
            'attr_name' => 'Attr Name',
            'dbd_miseo_reference' => 'Dbd Miseo Reference',
            'dbd_miseo_group' => 'Dbd Miseo Group',
            'dbd_miseo_template' => 'Dbd Miseo Template',
            'dbd_satellite' => 'Dbd Satellite',
            'dbd_phase' => 'Dbd Phase',
            'dbd_delta_lat_north' => 'Dbd Delta Lat North',
            'dbd_delta_lat_south' => 'Dbd Delta Lat South',
            'def_attr_name' => 'Def Attr Name',
            'def_attr_image' => 'Def Attr Image',
            'def_attr_type' => 'Def Attr Type',
            'def_attr_c1' => 'Def Attr C1',
            'def_attr_c2' => 'Def Attr C2',
            'def_attr_c3' => 'Def Attr C3',
            'def_attr_c4' => 'Def Attr C4',
            'def_miseo_name' => 'Def Miseo Name',
            'def_strip_status_id' => 'Def Strip Status ID',
            'def_rank' => 'Def Rank',
            'def_lat_center' => 'Def Lat Center',
            'def_lon_center' => 'Def Lon Center',
            'def_strip_length' => 'Def Strip Length',
            'def_strip_width' => 'Def Strip Width',
            'def_lat_corner_nw' => 'Def Lat Corner Nw',
            'def_lon_corner_nw' => 'Def Lon Corner Nw',
            'def_lat_corner_ne' => 'Def Lat Corner Ne',
            'def_lon_corner_ne' => 'Def Lon Corner Ne',
            'def_lat_corner_se' => 'Def Lat Corner Se',
            'def_lon_corner_se' => 'Def Lon Corner Se',
            'def_lat_corner_sw' => 'Def Lat Corner Sw',
            'def_lon_corner_sw' => 'Def Lon Corner Sw',
            'created' => 'Created',
            'modified' => 'Modified',
            'scene_id' => 'Scene ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefStripStatus()
    {
        return $this->hasOne(StripStatus::className(), ['id' => 'def_strip_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocal()
    {
        return $this->hasOne(MissionLocal::className(), ['id' => 'mission_local_id']);
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
    public function getStripAccessLocals()
    {
        return $this->hasMany(StripAccessLocal::className(), ['splitted_strip_local_id' => 'id']);
    }
}
