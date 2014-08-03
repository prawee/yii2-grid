<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanLocal;

/**
 * PlanLocalSearch represents the model behind the search form about `app\models\PlanLocal`.
 */
class PlanLocalSearch extends PlanLocal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'databasedata_id', 'plan_status_id'], 'integer'],
            [['name', 'start_date', 'end_date', 'attr_version', 'attr_image', 'attr_key', 'attr_status', 'attr_type', 'attr_lock'], 'safe'],
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
        $query = PlanLocal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'databasedata_id' => $this->databasedata_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'plan_status_id' => $this->plan_status_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'attr_version', $this->attr_version])
            ->andFilterWhere(['like', 'attr_image', $this->attr_image])
            ->andFilterWhere(['like', 'attr_key', $this->attr_key])
            ->andFilterWhere(['like', 'attr_status', $this->attr_status])
            ->andFilterWhere(['like', 'attr_type', $this->attr_type])
            ->andFilterWhere(['like', 'attr_lock', $this->attr_lock]);

        return $dataProvider;
    }
}
