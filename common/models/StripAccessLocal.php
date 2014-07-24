<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "strip_access_local".
 *
 * @property integer $id
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property integer $orbit_cycle
 * @property string $orbit_cycle_couple
 * @property string $roll_max_access
 * @property string $earliest_date
 * @property integer $splitted_strip_local_id
 *
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
            [['miseo_reference', 'miseo_group', 'miseo_template'], 'required'],
            [['orbit_cycle', 'splitted_strip_local_id'], 'integer'],
            [['orbit_cycle_couple'], 'string'],
            [['roll_max_access'], 'number'],
            [['earliest_date'], 'safe'],
            [['miseo_reference', 'miseo_group', 'miseo_template'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'orbit_cycle' => 'Orbit Cycle',
            'orbit_cycle_couple' => 'Orbit Cycle Couple',
            'roll_max_access' => 'Roll Max Access',
            'earliest_date' => 'Earliest Date',
            'splitted_strip_local_id' => 'Splitted Strip Local ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplittedStripLocal()
    {
        return $this->hasOne(SplittedStripLocal::className(), ['id' => 'splitted_strip_local_id']);
    }
}
