<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MissionLocal;

/**
 * MissionLocalSearch represents the model behind the search form about `app\models\MissionLocal`.
 */
class MissionLocalSearch extends MissionLocal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dbd_organism', 'dbd_nb_summits_cov', 'pgz_request_status_id', 'pgz_downlink_station_id', 'pgz_average_altitude', 'pgz_nb_summits_cov', 'pgz_item_length', 'def_id_user', 'def_priority_id', 'def_periodicity_period', 'def_periodicity_min_delay_between_shots', 'cri_sensor_type', 'cri_compression_ratio', 'created_by_id', 'midified_by_id', 'distributor_id', 'client_id', 'status', 'scene_id'], 'integer'],
            [['attr_version', 'attr_image', 'attr_type', 'attr_status', 'attr_lock', 'attr_name', 'name', 'dbd_miseo_reference', 'dbd_miseo_group', 'dbd_periodicity_flag', 'dbd_stereo_type', 'pgz_attr_name', 'pgz_attr_image', 'pgz_attr_type', 'pgz_attr_c1', 'pgz_attr_c2', 'pgz_attr_c3', 'pgz_attr_c4', 'pgz_miseo_name', 'pgz_satellite', 'pgz_phase', 'pgz_miseo_template', 'def_attr_name', 'def_attr_image', 'def_attr_type', 'def_attr_c1', 'def_attr_c2', 'def_attr_c3', 'def_attr_c4', 'def_user_coordinates', 'def_miseo_comment', 'def_deposit_date', 'def_start_date', 'def_end_date', 'def_completion_date', 'def_periodicity_flag', 'cri_attr_name', 'cri_attr_image', 'cri_attr_type', 'cri_attr_c1', 'cri_attr_c2', 'cri_attr_c3', 'cri_attr_c4', 'cri_updatable_gains', 'cri_sensor_type_bgain', 'cri_sensor_type_ggain', 'cri_sensor_type_rgain', 'cri_sensor_type_irgain', 'cri_sensor_type_gain', 'cri_nadir_viewing', 'cri_luminosity', 'created', 'modified'], 'safe'],
            [['pgz_center_latitude', 'pgz_center_longitude', 'cri_nadir_min_roll', 'cri_nadir_max_roll', 'cri_nadir_min_pitch', 'cri_nadir_max_pitch'], 'number'],
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
        $query = MissionLocal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dbd_organism' => $this->dbd_organism,
            'dbd_nb_summits_cov' => $this->dbd_nb_summits_cov,
            'pgz_request_status_id' => $this->pgz_request_status_id,
            'pgz_downlink_station_id' => $this->pgz_downlink_station_id,
            'pgz_average_altitude' => $this->pgz_average_altitude,
            'pgz_center_latitude' => $this->pgz_center_latitude,
            'pgz_center_longitude' => $this->pgz_center_longitude,
            'pgz_nb_summits_cov' => $this->pgz_nb_summits_cov,
            'pgz_item_length' => $this->pgz_item_length,
            'def_id_user' => $this->def_id_user,
            'def_deposit_date' => $this->def_deposit_date,
            'def_start_date' => $this->def_start_date,
            'def_end_date' => $this->def_end_date,
            'def_completion_date' => $this->def_completion_date,
            'def_priority_id' => $this->def_priority_id,
            'def_periodicity_period' => $this->def_periodicity_period,
            'def_periodicity_min_delay_between_shots' => $this->def_periodicity_min_delay_between_shots,
            'cri_sensor_type' => $this->cri_sensor_type,
            'cri_nadir_min_roll' => $this->cri_nadir_min_roll,
            'cri_nadir_max_roll' => $this->cri_nadir_max_roll,
            'cri_nadir_min_pitch' => $this->cri_nadir_min_pitch,
            'cri_nadir_max_pitch' => $this->cri_nadir_max_pitch,
            'cri_compression_ratio' => $this->cri_compression_ratio,
            'created' => $this->created,
            'modified' => $this->modified,
            'created_by_id' => $this->created_by_id,
            'midified_by_id' => $this->midified_by_id,
            'distributor_id' => $this->distributor_id,
            'client_id' => $this->client_id,
            'status' => $this->status,
            'scene_id' => $this->scene_id,
        ]);

        $query->andFilterWhere(['like', 'attr_version', $this->attr_version])
            ->andFilterWhere(['like', 'attr_image', $this->attr_image])
            ->andFilterWhere(['like', 'attr_type', $this->attr_type])
            ->andFilterWhere(['like', 'attr_status', $this->attr_status])
            ->andFilterWhere(['like', 'attr_lock', $this->attr_lock])
            ->andFilterWhere(['like', 'attr_name', $this->attr_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'dbd_miseo_reference', $this->dbd_miseo_reference])
            ->andFilterWhere(['like', 'dbd_miseo_group', $this->dbd_miseo_group])
            ->andFilterWhere(['like', 'dbd_periodicity_flag', $this->dbd_periodicity_flag])
            ->andFilterWhere(['like', 'dbd_stereo_type', $this->dbd_stereo_type])
            ->andFilterWhere(['like', 'pgz_attr_name', $this->pgz_attr_name])
            ->andFilterWhere(['like', 'pgz_attr_image', $this->pgz_attr_image])
            ->andFilterWhere(['like', 'pgz_attr_type', $this->pgz_attr_type])
            ->andFilterWhere(['like', 'pgz_attr_c1', $this->pgz_attr_c1])
            ->andFilterWhere(['like', 'pgz_attr_c2', $this->pgz_attr_c2])
            ->andFilterWhere(['like', 'pgz_attr_c3', $this->pgz_attr_c3])
            ->andFilterWhere(['like', 'pgz_attr_c4', $this->pgz_attr_c4])
            ->andFilterWhere(['like', 'pgz_miseo_name', $this->pgz_miseo_name])
            ->andFilterWhere(['like', 'pgz_satellite', $this->pgz_satellite])
            ->andFilterWhere(['like', 'pgz_phase', $this->pgz_phase])
            ->andFilterWhere(['like', 'pgz_miseo_template', $this->pgz_miseo_template])
            ->andFilterWhere(['like', 'def_attr_name', $this->def_attr_name])
            ->andFilterWhere(['like', 'def_attr_image', $this->def_attr_image])
            ->andFilterWhere(['like', 'def_attr_type', $this->def_attr_type])
            ->andFilterWhere(['like', 'def_attr_c1', $this->def_attr_c1])
            ->andFilterWhere(['like', 'def_attr_c2', $this->def_attr_c2])
            ->andFilterWhere(['like', 'def_attr_c3', $this->def_attr_c3])
            ->andFilterWhere(['like', 'def_attr_c4', $this->def_attr_c4])
            ->andFilterWhere(['like', 'def_user_coordinates', $this->def_user_coordinates])
            ->andFilterWhere(['like', 'def_miseo_comment', $this->def_miseo_comment])
            ->andFilterWhere(['like', 'def_periodicity_flag', $this->def_periodicity_flag])
            ->andFilterWhere(['like', 'cri_attr_name', $this->cri_attr_name])
            ->andFilterWhere(['like', 'cri_attr_image', $this->cri_attr_image])
            ->andFilterWhere(['like', 'cri_attr_type', $this->cri_attr_type])
            ->andFilterWhere(['like', 'cri_attr_c1', $this->cri_attr_c1])
            ->andFilterWhere(['like', 'cri_attr_c2', $this->cri_attr_c2])
            ->andFilterWhere(['like', 'cri_attr_c3', $this->cri_attr_c3])
            ->andFilterWhere(['like', 'cri_attr_c4', $this->cri_attr_c4])
            ->andFilterWhere(['like', 'cri_updatable_gains', $this->cri_updatable_gains])
            ->andFilterWhere(['like', 'cri_sensor_type_bgain', $this->cri_sensor_type_bgain])
            ->andFilterWhere(['like', 'cri_sensor_type_ggain', $this->cri_sensor_type_ggain])
            ->andFilterWhere(['like', 'cri_sensor_type_rgain', $this->cri_sensor_type_rgain])
            ->andFilterWhere(['like', 'cri_sensor_type_irgain', $this->cri_sensor_type_irgain])
            ->andFilterWhere(['like', 'cri_sensor_type_gain', $this->cri_sensor_type_gain])
            ->andFilterWhere(['like', 'cri_nadir_viewing', $this->cri_nadir_viewing])
            ->andFilterWhere(['like', 'cri_luminosity', $this->cri_luminosity]);

        return $dataProvider;
    }
}
