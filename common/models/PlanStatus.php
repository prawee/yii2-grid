<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property PlanLocal[] $planLocals
 */
class PlanStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanLocals()
    {
        return $this->hasMany(PlanLocal::className(), ['plan_status_id' => 'id']);
    }
}
