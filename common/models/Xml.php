<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xml".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $send_email
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
            [['send_email', 'user_id', 'scene_id', 'status'], 'integer'],
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
            'send_email' => 'Send Email',
            'user_id' => 'User ID',
            'scene_id' => 'Scene ID',
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
