<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "strip_status".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Strips[] $strips
 */
class StripStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'strip_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128]
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
    public function getStrips()
    {
        return $this->hasMany(Strips::className(), ['strip_status_id' => 'id']);
    }
}
