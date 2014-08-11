<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "som_polygon_local".
 *
 * @property integer $id
 * @property integer $mission_local_id
 * @property string $attr_type
 * @property string $attr_format
 * @property string $attr_image
 * @property string $attr_lock
 * @property string $attr_name
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property string $point_latitude
 * @property string $point_longitude
 * @property integer $scene_id
 *
 * @property Scene $scene
 * @property MissionLocal $missionLocal
 */
class SomPolygonLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'som_polygon_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mission_local_id', 'scene_id'], 'integer'],
            [['miseo_group'], 'string'],
            [['point_latitude', 'point_longitude'], 'number'],
            [['attr_type', 'attr_format', 'attr_image', 'attr_lock', 'attr_name'], 'string', 'max' => 45],
            [['miseo_reference'], 'string', 'max' => 255],
            [['miseo_template'], 'string', 'max' => 128]
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
            'attr_type' => 'Attr Type',
            'attr_format' => 'Attr Format',
            'attr_image' => 'Attr Image',
            'attr_lock' => 'Attr Lock',
            'attr_name' => 'Attr Name',
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'point_latitude' => 'Point Latitude',
            'point_longitude' => 'Point Longitude',
            'scene_id' => 'Scene ID',
        ];
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
    public function getMissionLocal()
    {
        return $this->hasOne(MissionLocal::className(), ['id' => 'mission_local_id']);
    }
}
