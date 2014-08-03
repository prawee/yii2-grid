<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan_local".
 *
 * @property integer $id
 * @property string $name
 * @property integer $databasedata_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $plan_status_id
 * @property string $attr_version
 * @property string $attr_image
 * @property string $attr_key
 * @property string $attr_status
 * @property string $attr_type
 * @property string $attr_lock
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
            [['name'], 'required'],
            [['databasedata_id', 'plan_status_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['attr_version', 'attr_key', 'attr_status', 'attr_type'], 'string', 'max' => 45],
            [['attr_image'], 'string', 'max' => 128],
            [['attr_lock'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'databasedata_id' => 'Databasedata ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'plan_status_id' => 'Plan Status ID',
            'attr_version' => 'Attr Version',
            'attr_image' => 'Attr Image',
            'attr_key' => 'Attr Key',
            'attr_status' => 'Attr Status',
            'attr_type' => 'Attr Type',
            'attr_lock' => 'Attr Lock',
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
