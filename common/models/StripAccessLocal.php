<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "strip_access_local".
 *
 * @property integer $id
 * @property integer $splitted_strip_local_id
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_image
 * @property string $attr_name
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property integer $orbit_cycle
 * @property string $orbit_cycle_couple
 * @property string $roll_max_access
 * @property string $earliest_date
 * @property string $created
 * @property string $modified
 * @property integer $modified_by_id
 * @property integer $scene_id
 *
 * @property User $modifiedBy
 * @property Scene $scene
 * @property SplittedStripLocal $splittedStripLocal
 */
class StripAccessLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'strip_access_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['splitted_strip_local_id', 'orbit_cycle', 'modified_by_id', 'scene_id'], 'integer'],
            [['miseo_group', 'orbit_cycle_couple'], 'string'],
            [['earliest_date', 'created', 'modified'], 'safe'],
            [['attr_status', 'attr_type', 'attr_image', 'attr_name'], 'string', 'max' => 45],
            [['miseo_reference', 'miseo_template'], 'string', 'max' => 128],
            [['roll_max_access'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'splitted_strip_local_id' => 'Splitted Strip Local ID',
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_image' => 'Attr Image',
            'attr_name' => 'Attr Name',
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'orbit_cycle' => 'Orbit Cycle',
            'orbit_cycle_couple' => 'Orbit Cycle Couple',
            'roll_max_access' => 'Roll Max Access',
            'earliest_date' => 'Earliest Date',
            'created' => 'Created',
            'modified' => 'Modified',
            'modified_by_id' => 'Modified By ID',
            'scene_id' => 'Scene ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'modified_by_id']);
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
    public function getSplittedStripLocal()
    {
        return $this->hasOne(SplittedStripLocal::className(), ['id' => 'splitted_strip_local_id']);
    }
}
