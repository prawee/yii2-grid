<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "strips".
 *
 * @property integer $id
 * @property string $miseo_name
 * @property integer $rank
 * @property string $lat_center
 * @property string $lon_center
 * @property string $strip_length
 * @property string $strip_width
 * @property string $lat_corner_nw
 * @property string $lon_corner_nw
 * @property string $lat_corner_ne
 * @property string $lon_corner_ne
 * @property string $lat_corner_se
 * @property string $lon_corner_se
 * @property string $lat_corner_sw
 * @property string $lon_corner_sw
 * @property integer $strip_status_id
 *
 * @property SplittedStripLocal[] $splittedStripLocals
 * @property StripStatus $stripStatus
 */
class Strips extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'strips';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['miseo_name', 'lat_center', 'lon_center', 'strip_length', 'strip_width', 'lat_corner_nw', 'lon_corner_nw', 'lat_corner_ne', 'lon_corner_ne', 'lat_corner_se', 'lon_corner_se', 'lat_corner_sw', 'lon_corner_sw'], 'required'],
            [['rank', 'strip_status_id'], 'integer'],
            [['lat_center', 'lon_center', 'strip_length', 'strip_width', 'lat_corner_nw', 'lon_corner_nw', 'lat_corner_ne', 'lon_corner_ne', 'lat_corner_se', 'lon_corner_se', 'lat_corner_sw', 'lon_corner_sw'], 'number'],
            [['miseo_name'], 'string', 'max' => 255]
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
            'rank' => 'Rank',
            'lat_center' => 'Lat Center',
            'lon_center' => 'Lon Center',
            'strip_length' => 'Strip Length',
            'strip_width' => 'Strip Width',
            'lat_corner_nw' => 'Lat Corner Nw',
            'lon_corner_nw' => 'Lon Corner Nw',
            'lat_corner_ne' => 'Lat Corner Ne',
            'lon_corner_ne' => 'Lon Corner Ne',
            'lat_corner_se' => 'Lat Corner Se',
            'lon_corner_se' => 'Lon Corner Se',
            'lat_corner_sw' => 'Lat Corner Sw',
            'lon_corner_sw' => 'Lon Corner Sw',
            'strip_status_id' => 'Strip Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplittedStripLocals()
    {
        return $this->hasMany(SplittedStripLocal::className(), ['strips_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStripStatus()
    {
        return $this->hasOne(StripStatus::className(), ['id' => 'strip_status_id']);
    }
}
