<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SplittedStripLocal;

/**
 * SplittedStripLocalSearch represents the model behind the search form about `app\models\SplittedStripLocal`.
 */
class SplittedStripLocalSearch extends SplittedStripLocal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mission_local_id', 'def_strip_status_id', 'def_rank', 'scene_id'], 'integer'],
            [['attr_status', 'attr_type', 'attr_image', 'attr_lock', 'attr_name', 'dbd_miseo_reference', 'dbd_miseo_group', 'dbd_miseo_template', 'dbd_satellite', 'dbd_phase', 'def_attr_name', 'def_attr_image', 'def_attr_type', 'def_attr_c1', 'def_attr_c2', 'def_attr_c3', 'def_attr_c4', 'def_miseo_name', 'created', 'modified'], 'safe'],
            [['dbd_delta_lat_north', 'dbd_delta_lat_south', 'def_lat_center', 'def_lon_center', 'def_strip_length', 'def_strip_width', 'def_lat_corner_nw', 'def_lon_corner_nw', 'def_lat_corner_ne', 'def_lon_corner_ne', 'def_lat_corner_se', 'def_lon_corner_se', 'def_lat_corner_sw', 'def_lon_corner_sw'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SplittedStripLocal::find();
        //$query->innerWith(['scene']);
        //$query->innerJoin('scene','scene.id=splitted_strip_local.scene_id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mission_local_id' => $this->mission_local_id,
            'dbd_delta_lat_north' => $this->dbd_delta_lat_north,
            'dbd_delta_lat_south' => $this->dbd_delta_lat_south,
            'def_strip_status_id' => $this->def_strip_status_id,
            'def_rank' => $this->def_rank,
            'def_lat_center' => $this->def_lat_center,
            'def_lon_center' => $this->def_lon_center,
            'def_strip_length' => $this->def_strip_length,
            'def_strip_width' => $this->def_strip_width,
            'def_lat_corner_nw' => $this->def_lat_corner_nw,
            'def_lon_corner_nw' => $this->def_lon_corner_nw,
            'def_lat_corner_ne' => $this->def_lat_corner_ne,
            'def_lon_corner_ne' => $this->def_lon_corner_ne,
            'def_lat_corner_se' => $this->def_lat_corner_se,
            'def_lon_corner_se' => $this->def_lon_corner_se,
            'def_lat_corner_sw' => $this->def_lat_corner_sw,
            'def_lon_corner_sw' => $this->def_lon_corner_sw,
            'created' => $this->created,
            'modified' => $this->modified,
            'scene_id' => $this->scene_id,
        ]);

        $query->andFilterWhere(['like', 'attr_status', $this->attr_status])
            ->andFilterWhere(['like', 'attr_type', $this->attr_type])
            ->andFilterWhere(['like', 'attr_image', $this->attr_image])
            ->andFilterWhere(['like', 'attr_lock', $this->attr_lock])
            ->andFilterWhere(['like', 'attr_name', $this->attr_name])
            ->andFilterWhere(['like', 'dbd_miseo_reference', $this->dbd_miseo_reference])
            ->andFilterWhere(['like', 'dbd_miseo_group', $this->dbd_miseo_group])
            ->andFilterWhere(['like', 'dbd_miseo_template', $this->dbd_miseo_template])
            ->andFilterWhere(['like', 'dbd_satellite', $this->dbd_satellite])
            ->andFilterWhere(['like', 'dbd_phase', $this->dbd_phase])
            ->andFilterWhere(['like', 'def_attr_name', $this->def_attr_name])
            ->andFilterWhere(['like', 'def_attr_image', $this->def_attr_image])
            ->andFilterWhere(['like', 'def_attr_type', $this->def_attr_type])
            ->andFilterWhere(['like', 'def_attr_c1', $this->def_attr_c1])
            ->andFilterWhere(['like', 'def_attr_c2', $this->def_attr_c2])
            ->andFilterWhere(['like', 'def_attr_c3', $this->def_attr_c3])
            ->andFilterWhere(['like', 'def_attr_c4', $this->def_attr_c4])
            ->andFilterWhere(['like', 'def_miseo_name', $this->def_miseo_name]);

        return $dataProvider;
    }
}
