<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trial_local".
 *
 * @property integer $id
 * @property string $attr_name
 * @property string $attr_lock
 * @property string $attr_image
 * @property string $attr_type
 * @property string $attr_status
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property string $medium_post_x
 * @property string $medium_post_y
 * @property string $medium_post_z
 * @property string $plan_id
 * @property integer $trial_status_id
 * @property string $satellite
 * @property string $start_acqu_date
 * @property string $stop_acqu_date
 * @property string $roll
 * @property string $pitch
 * @property integer $orbit_cycle
 * @property string $luminosity
 * @property integer $cloud_coverage
 */
class TrialLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trial_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_name'], 'required'],
            [['medium_post_x', 'medium_post_y', 'medium_post_z', 'roll', 'pitch'], 'number'],
            [['trial_status_id', 'orbit_cycle', 'cloud_coverage'], 'integer'],
            [['start_acqu_date', 'stop_acqu_date'], 'safe'],
            [['attr_name', 'miseo_reference', 'miseo_group', 'miseo_template', 'plan_id'], 'string', 'max' => 255],
            [['attr_lock', 'satellite', 'luminosity'], 'string', 'max' => 1],
            [['attr_image', 'attr_type', 'attr_status'], 'string', 'max' => 45]
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
            'attr_lock' => 'Attr Lock',
            'attr_image' => 'Attr Image',
            'attr_type' => 'Attr Type',
            'attr_status' => 'Attr Status',
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'medium_post_x' => 'Medium Post X',
            'medium_post_y' => 'Medium Post Y',
            'medium_post_z' => 'Medium Post Z',
            'plan_id' => 'Plan ID',
            'trial_status_id' => 'Trial Status ID',
            'satellite' => 'Satellite',
            'start_acqu_date' => 'Start Acqu Date',
            'stop_acqu_date' => 'Stop Acqu Date',
            'roll' => 'Roll',
            'pitch' => 'Pitch',
            'orbit_cycle' => 'Orbit Cycle',
            'luminosity' => 'Luminosity',
            'cloud_coverage' => 'Cloud Coverage',
        ];
    }
}
