<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "groupzone".
 *
 * @property integer $id
 * @property string $miseo_name
 * @property string $info_1
 * @property string $info_2
 * @property string $info_3
 * @property string $info_4
 *
 * @property MiseoGroupLocal[] $miseoGroupLocals
 */
class Groupzone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groupzone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['miseo_name'], 'required'],
            [['info_1', 'info_2', 'info_3', 'info_4'], 'string'],
            [['miseo_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'miseo_name' => 'Miseo Name',
            'info_1' => 'Info 1',
            'info_2' => 'Info 2',
            'info_3' => 'Info 3',
            'info_4' => 'Info 4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiseoGroupLocals()
    {
        return $this->hasMany(MiseoGroupLocal::className(), ['groupzone_id' => 'id']);
    }
}
