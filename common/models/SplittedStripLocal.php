<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "splitted_strip_local".
 *
 * @property integer $id
 * @property integer $databasedata_id
 * @property integer $strips_id
 * @property integer $scene_id
 * @property integer $status
 * @property string $type
 * @property string $image
 * @property string $name
 *
 * @property Databasedata $databasedata
 * @property Strips $strips
 * @property StripAccessLocal[] $stripAccessLocals
 */
class SplittedStripLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'splitted_strip_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['databasedata_id', 'strips_id', 'scene_id', 'status'], 'integer'],
            [['type', 'image'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'databasedata_id' => 'Databasedata ID',
            'strips_id' => 'Strips ID',
            'scene_id' => 'Scene ID',
            'status' => 'Status',
            'type' => 'Type',
            'image' => 'Image',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatabasedata()
    {
        return $this->hasOne(Databasedata::className(), ['id' => 'databasedata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrips()
    {
        return $this->hasOne(Strips::className(), ['id' => 'strips_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStripAccessLocals()
    {
        return $this->hasMany(StripAccessLocal::className(), ['splitted_strip_local_id' => 'id']);
    }
}
