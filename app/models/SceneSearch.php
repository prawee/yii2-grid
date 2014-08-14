<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scene;
use yii\data\Sort;

/**
 * SceneSearch represents the model behind the search form about `app\models\Scene`.
 */
class SceneSearch extends Scene
{
    public $requestName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['wo_doc_name', 'aoi_name','requestName'], 'safe'],
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
        $query=Scene::find();
        $query->joinWith('splittedStripLocals');
        //$query->joinWith('splittedStripLocals',true,'RIGHT JOIN')->orderBy('scene.id')->all();
        /*$query->joinWith([
            'splittedStripLocals'=>function($query){
                $query->from('splitted_strip_local');
            }
        ]);*/
        
        
        $sort = new Sort;
        $sort->attributes=[
            'wo_doc_name'=>[
                'asc' => ['wo_doc_name' => SORT_ASC],
                'desc' => ['wo_doc_name' => SORT_DESC],
            ],
            'aoi_name'=>[
                'asc' => ['aoi_name' => SORT_ASC],
                'desc' => ['aoi_name' => SORT_DESC],
            ],
            'requestName'=>[
                'asc' => ['splitted_strip_local.attr_name' => SORT_ASC],
                'desc' => ['splitted_strip_local.attr_name' => SORT_DESC],
            ]
        ];
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>$sort,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'wo_doc_name', $this->wo_doc_name])
            ->andFilterWhere(['like', 'aoi_name', $this->aoi_name]);
        

        return $dataProvider;
    }
}
