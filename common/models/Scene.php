<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scene".
 *
 * @property integer $id
 * @property string $wo_doc_name
 * @property string $aoi_name
 *
 * @property MissionLocal[] $missionLocals
 * @property SomPolygonLocal[] $somPolygonLocals
 * @property SplittedStripLocal[] $splittedStripLocals
 * @property StripAccessLocal[] $stripAccessLocals
 */
class Scene extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scene';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wo_doc_name'], 'string', 'max' => 255],
            [['aoi_name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wo_doc_name' => 'Wo Doc Name',
            'aoi_name' => 'Aoi Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['scene_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSomPolygonLocals()
    {
        return $this->hasMany(SomPolygonLocal::className(), ['scene_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplittedStripLocals()
    {
        return $this->hasMany(SplittedStripLocal::className(), ['scene_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStripAccessLocals()
    {
        return $this->hasMany(StripAccessLocal::className(), ['scene_id' => 'id']);
    }
}
