<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property MissionLocal[] $missionLocals
 */
class RequestStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_status';
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
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['pgz_request_status_id' => 'id']);
    }
}
