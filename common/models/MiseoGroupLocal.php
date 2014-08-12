<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "miseo_group_local".
 *
 * @property integer $id
 * @property string $attr_version
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_image
 * @property string $attr_name
 * @property string $dbd_miseo_reference
 * @property string $dbd_miseo_group
 * @property string $dbd_miseo_template
 * @property string $gz_attr_name
 * @property string $gz_attr_image
 * @property string $gz_attr_type
 * @property string $gz_attr_c1
 * @property string $gz_attr_c2
 * @property string $gz_attr_c3
 * @property string $gz_attr_c4
 * @property string $gz_miseo_name
 * @property string $gz_info1
 * @property string $gz_info2
 * @property string $gz_info3
 * @property string $gz_info4
 *
 * @property MissionLocal[] $missionLocals
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
            [['dbd_miseo_group', 'gz_info1', 'gz_info2', 'gz_info3', 'gz_info4'], 'string'],
            [['attr_version', 'attr_status', 'attr_type', 'attr_image', 'dbd_miseo_template', 'gz_attr_name', 'gz_attr_image', 'gz_attr_type', 'gz_attr_c1', 'gz_attr_c2', 'gz_attr_c3', 'gz_attr_c4'], 'string', 'max' => 45],
            [['attr_name', 'dbd_miseo_reference', 'gz_miseo_name'], 'string', 'max' => 255]
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
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_image' => 'Attr Image',
            'attr_name' => 'Attr Name',
            'dbd_miseo_reference' => 'Dbd Miseo Reference',
            'dbd_miseo_group' => 'Dbd Miseo Group',
            'dbd_miseo_template' => 'Dbd Miseo Template',
            'gz_attr_name' => 'Gz Attr Name',
            'gz_attr_image' => 'Gz Attr Image',
            'gz_attr_type' => 'Gz Attr Type',
            'gz_attr_c1' => 'Gz Attr C1',
            'gz_attr_c2' => 'Gz Attr C2',
            'gz_attr_c3' => 'Gz Attr C3',
            'gz_attr_c4' => 'Gz Attr C4',
            'gz_miseo_name' => 'Gz Miseo Name',
            'gz_info1' => 'Gz Info1',
            'gz_info2' => 'Gz Info2',
            'gz_info3' => 'Gz Info3',
            'gz_info4' => 'Gz Info4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['miseo_group_local_id' => 'id']);
    }
}
