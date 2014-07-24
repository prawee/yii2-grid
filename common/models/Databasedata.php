<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "databasedata".
 *
 * @property integer $id
 * @property string $name
 * @property string $miseo_reference
 * @property string $miseo_group
 * @property string $miseo_template
 * @property integer $nb_summits_cov
 * @property string $stereo_type
 * @property integer $organism
 * @property string $delta_lat_north
 * @property string $delta_lat_south
 *
 * @property MiseoGroupLocal[] $miseoGroupLocals
 * @property MissionLocal[] $missionLocals
 * @property SplittedStripLocal[] $splittedStripLocals
 */
class Databasedata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'databasedata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nb_summits_cov', 'organism'], 'integer'],
            [['delta_lat_north', 'delta_lat_south'], 'number'],
            [['name', 'miseo_reference', 'miseo_group', 'miseo_template'], 'string', 'max' => 255],
            [['stereo_type'], 'string', 'max' => 1]
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
            'miseo_reference' => 'Miseo Reference',
            'miseo_group' => 'Miseo Group',
            'miseo_template' => 'Miseo Template',
            'nb_summits_cov' => 'Nb Summits Cov',
            'stereo_type' => 'Stereo Type',
            'organism' => 'Organism',
            'delta_lat_north' => 'Delta Lat North',
            'delta_lat_south' => 'Delta Lat South',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiseoGroupLocals()
    {
        return $this->hasMany(MiseoGroupLocal::className(), ['databasedata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['databasedata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSplittedStripLocals()
    {
        return $this->hasMany(SplittedStripLocal::className(), ['databasedata_id' => 'id']);
    }
}
