<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "definition".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $user_coordinates
 * @property string $miseo_comment
 * @property string $deposit_date
 * @property string $start_date
 * @property string $end_date
 * @property string $completion_date
 * @property string $periodicity_flag
 * @property integer $priority_id
 *
 * @property Priority $priority
 * @property MissionLocal[] $missionLocals
 */
class Definition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'definition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_coordinates', 'periodicity_flag'], 'required'],
            [['miseo_comment'], 'string'],
            [['deposit_date', 'start_date', 'end_date', 'completion_date'], 'safe'],
            [['priority_id'], 'integer'],
            [['user_id', 'user_coordinates'], 'string', 'max' => 255],
            [['periodicity_flag'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_coordinates' => 'User Coordinates',
            'miseo_comment' => 'Miseo Comment',
            'deposit_date' => 'Deposit Date',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'completion_date' => 'Completion Date',
            'periodicity_flag' => 'Periodicity Flag',
            'priority_id' => 'Priority ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriority()
    {
        return $this->hasOne(Priority::className(), ['id' => 'priority_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['definition_id' => 'id']);
    }
}
