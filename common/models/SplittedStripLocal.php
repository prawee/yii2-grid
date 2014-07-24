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
 *
 * @property Strips $strips
 * @property Databasedata $databasedata
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
            [['databasedata_id', 'strips_id', 'scene_id'], 'integer']
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
        ];
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
    public function getDatabasedata()
    {
        return $this->hasOne(Databasedata::className(), ['id' => 'databasedata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStripAccessLocals()
    {
        return $this->hasMany(StripAccessLocal::className(), ['splitted_strip_local_id' => 'id']);
    }
}
