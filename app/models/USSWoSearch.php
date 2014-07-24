<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\USSWo;

/**
 * USSWoSearch represents the model behind the search form about `app\models\USSWo`.
 */
class USSWoSearch extends USSWo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'aoi_id', 'order_id', 'order_doc_no', 'order_doc_year', 'order_status', 'quantity', 'attr_ta_id', 'attr_tl_id', 'attr_s_id', 'attr_pt_id', 'attr_ct_id', 'wo_doc_year', 'wo_doc_no', 'tpt_status', 'tpt_user_id', 'customer_id'], 'integer'],
            [['order_doc_prefix', 'aoi_name', 'satellite_id', 'acq_date_start', 'acq_date_end', 'unit', 'remark', 'attr_ta', 'attr_tl', 'attr_s', 'attr_pt', 'attr_ct', 'is_ortho', 'is_rush', 'is_dem', 'created', 'modified', 'wo_doc_name', 'wo_created', 'wo_modified', 'tpt_user_name', 'customer_name', 'customer_name_th', 'project_name'], 'safe'],
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
        $query = USSWo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'aoi_id' => $this->aoi_id,
            'order_id' => $this->order_id,
            'order_doc_no' => $this->order_doc_no,
            'order_doc_year' => $this->order_doc_year,
            'order_status' => $this->order_status,
            'acq_date_start' => $this->acq_date_start,
            'quantity' => $this->quantity,
            'attr_ta_id' => $this->attr_ta_id,
            'attr_tl_id' => $this->attr_tl_id,
            'attr_s_id' => $this->attr_s_id,
            'attr_pt_id' => $this->attr_pt_id,
            'attr_ct_id' => $this->attr_ct_id,
            'created' => $this->created,
            'modified' => $this->modified,
            'wo_doc_year' => $this->wo_doc_year,
            'wo_doc_no' => $this->wo_doc_no,
            'wo_created' => $this->wo_created,
            'wo_modified' => $this->wo_modified,
            'tpt_status' => $this->tpt_status,
            'tpt_user_id' => $this->tpt_user_id,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'order_doc_prefix', $this->order_doc_prefix])
            ->andFilterWhere(['like', 'aoi_name', $this->aoi_name])
            ->andFilterWhere(['like', 'satellite_id', $this->satellite_id])
            ->andFilterWhere(['like', 'acq_date_end', $this->acq_date_end])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'attr_ta', $this->attr_ta])
            ->andFilterWhere(['like', 'attr_tl', $this->attr_tl])
            ->andFilterWhere(['like', 'attr_s', $this->attr_s])
            ->andFilterWhere(['like', 'attr_pt', $this->attr_pt])
            ->andFilterWhere(['like', 'attr_ct', $this->attr_ct])
            ->andFilterWhere(['like', 'is_ortho', $this->is_ortho])
            ->andFilterWhere(['like', 'is_rush', $this->is_rush])
            ->andFilterWhere(['like', 'is_dem', $this->is_dem])
            ->andFilterWhere(['like', 'wo_doc_name', $this->wo_doc_name])
            ->andFilterWhere(['like', 'tpt_user_name', $this->tpt_user_name])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_name_th', $this->customer_name_th])
            ->andFilterWhere(['like', 'project_name', $this->project_name]);

        return $dataProvider;
    }
  
    public function getMissionLocal()
    {
        return $this->hasOne(MissionLocal::className(), ['id' => 'scene_id']);
    }
    public function searchx($params)
    {
        $query = USSWo::find();
//        $query = USSWo::find()->innerJoin('mission_local', 'mission_local.scene_id=tpt_wo.id')
//        ->with('MissionLocal')->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'aoi_id' => $this->aoi_id,
            'order_id' => $this->order_id,
            'order_doc_no' => $this->order_doc_no,
            'order_doc_year' => $this->order_doc_year,
            'order_status' => $this->order_status,
            'acq_date_start' => $this->acq_date_start,
            'quantity' => $this->quantity,
            'attr_ta_id' => $this->attr_ta_id,
            'attr_tl_id' => $this->attr_tl_id,
            'attr_s_id' => $this->attr_s_id,
            'attr_pt_id' => $this->attr_pt_id,
            'attr_ct_id' => $this->attr_ct_id,
            'created' => $this->created,
            'modified' => $this->modified,
            'wo_doc_year' => $this->wo_doc_year,
            'wo_doc_no' => $this->wo_doc_no,
            'wo_created' => $this->wo_created,
            'wo_modified' => $this->wo_modified,
            'tpt_status' => $this->tpt_status,
            'tpt_user_id' => $this->tpt_user_id,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'order_doc_prefix', $this->order_doc_prefix])
            ->andFilterWhere(['like', 'aoi_name', $this->aoi_name])
            ->andFilterWhere(['like', 'satellite_id', $this->satellite_id])
            ->andFilterWhere(['like', 'acq_date_end', $this->acq_date_end])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'attr_ta', $this->attr_ta])
            ->andFilterWhere(['like', 'attr_tl', $this->attr_tl])
            ->andFilterWhere(['like', 'attr_s', $this->attr_s])
            ->andFilterWhere(['like', 'attr_pt', $this->attr_pt])
            ->andFilterWhere(['like', 'attr_ct', $this->attr_ct])
            ->andFilterWhere(['like', 'is_ortho', $this->is_ortho])
            ->andFilterWhere(['like', 'is_rush', $this->is_rush])
            ->andFilterWhere(['like', 'is_dem', $this->is_dem])
            ->andFilterWhere(['like', 'wo_doc_name', $this->wo_doc_name])
            ->andFilterWhere(['like', 'tpt_user_name', $this->tpt_user_name])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_name_th', $this->customer_name_th])
            ->andFilterWhere(['like', 'project_name', $this->project_name]);

        return $dataProvider;
    }
}
