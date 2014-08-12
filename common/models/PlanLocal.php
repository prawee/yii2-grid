<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan_local".
 *
 * @property integer $id
 * @property string $attr_version
 * @property string $attr_image
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_lock
 * @property string $dbd_miseo_reference
 * @property string $dbd_miseo_group
 * @property string $dbd_miseo_template
 * @property string $miseo_name
 * @property string $start_date
 * @property string $end_date
 * @property integer $plan_status_id
 * @property string $plan_date
 * @property string $info
 * @property string $info1
 * @property string $info2
 *
 * @property PlanStatus $planStatus
 */
class PlanLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dbd_miseo_group'], 'string'],
            [['start_date', 'end_date', 'plan_date'], 'safe'],
            [['plan_status_id'], 'integer'],
            [['attr_version', 'attr_image', 'attr_status', 'attr_type', 'attr_lock', 'dbd_miseo_template'], 'string', 'max' => 45],
            [['dbd_miseo_reference', 'miseo_name', 'info', 'info1', 'info2'], 'string', 'max' => 255]
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
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_lock' => 'Attr Lock',
            'dbd_miseo_reference' => 'Dbd Miseo Reference',
            'dbd_miseo_group' => 'Dbd Miseo Group',
            'dbd_miseo_template' => 'Dbd Miseo Template',
            'miseo_name' => 'Miseo Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'plan_status_id' => 'Plan Status ID',
            'plan_date' => 'Plan Date',
            'info' => 'Info',
            'info1' => 'Info1',
            'info2' => 'Info2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanStatus()
    {
        return $this->hasOne(PlanStatus::className(), ['id' => 'plan_status_id']);
    }
}
