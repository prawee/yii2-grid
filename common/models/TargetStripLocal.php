<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "target_strip_local".
 *
 * @property integer $id
 * @property string $attr_name
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_image
 * @property integer $attr_c1
 * @property integer $attr_c2
 * @property integer $attr_c3
 * @property integer $attr_c4
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property string $satellite
 * @property string $phase
 * @property integer $rev_no
 * @property string $plan_id
 * @property integer $target_status_id
 * @property string $lat_center
 * @property string $lon_center
 * @property double $altitude_center
 * @property double $strip_length
 * @property double $strip_width
 * @property string $lat_corner_nw
 * @property string $lon_corner_nw
 * @property string $altitude_nw
 * @property string $lat_corner_ne
 * @property string $lon_corner_ne
 * @property string $altitude_ne
 * @property string $lat_corner_se
 * @property string $lon_corner_se
 * @property string $altitude_se
 * @property string $lat_corner_sw
 * @property string $lon_corner_sw
 * @property string $altitude_sw
 * @property string $gain1
 * @property string $gain2
 * @property string $gain3
 * @property string $gain4
 * @property integer $filenb
 */
class TargetStripLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'target_strip_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_name'], 'required'],
            [['attr_c1', 'attr_c2', 'attr_c3', 'attr_c4', 'rev_no', 'target_status_id', 'filenb'], 'integer'],
            [['lat_center', 'lon_center', 'altitude_center', 'strip_length', 'strip_width', 'lat_corner_nw', 'lon_corner_nw', 'altitude_nw', 'lat_corner_ne', 'lon_corner_ne', 'altitude_ne', 'lat_corner_se', 'lon_corner_se', 'altitude_se', 'lat_corner_sw', 'lon_corner_sw', 'altitude_sw'], 'number'],
            [['attr_name', 'miseo_reference', 'miseo_group', 'miseo_template', 'plan_id'], 'string', 'max' => 255],
            [['attr_status', 'attr_type', 'attr_image'], 'string', 'max' => 45],
            [['satellite', 'phase', 'gain1', 'gain2', 'gain3', 'gain4'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attr_name' => 'Attr Name',
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_image' => 'Attr Image',
            'attr_c1' => 'Attr C1',
            'attr_c2' => 'Attr C2',
            'attr_c3' => 'Attr C3',
            'attr_c4' => 'Attr C4',
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'satellite' => 'Satellite',
            'phase' => 'Phase',
            'rev_no' => 'Rev No',
            'plan_id' => 'Plan ID',
            'target_status_id' => 'Target Status ID',
            'lat_center' => 'Lat Center',
            'lon_center' => 'Lon Center',
            'altitude_center' => 'Altitude Center',
            'strip_length' => 'Strip Length',
            'strip_width' => 'Strip Width',
            'lat_corner_nw' => 'Lat Corner Nw',
            'lon_corner_nw' => 'Lon Corner Nw',
            'altitude_nw' => 'Altitude Nw',
            'lat_corner_ne' => 'Lat Corner Ne',
            'lon_corner_ne' => 'Lon Corner Ne',
            'altitude_ne' => 'Altitude Ne',
            'lat_corner_se' => 'Lat Corner Se',
            'lon_corner_se' => 'Lon Corner Se',
            'altitude_se' => 'Altitude Se',
            'lat_corner_sw' => 'Lat Corner Sw',
            'lon_corner_sw' => 'Lon Corner Sw',
            'altitude_sw' => 'Altitude Sw',
            'gain1' => 'Gain1',
            'gain2' => 'Gain2',
            'gain3' => 'Gain3',
            'gain4' => 'Gain4',
            'filenb' => 'Filenb',
        ];
    }
}
