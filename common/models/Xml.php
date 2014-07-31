<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xml".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $user_id
 * @property integer $scene_id
 * @property integer $status
 *
 * @property User $user
 */
class Xml extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xml';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['user_id', 'scene_id', 'status'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255]
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
            'path' => 'Path',
            'user_id' => 'User Id',
            'scene_id' => 'Scene Id',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
