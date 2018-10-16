<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Districts;

/**
 * DistrictsSearch represents the model behind the search form of `app\models\Districts`.
 */
class DistrictsSearch extends Districts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Districts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'name'=> SORT_ASC, 
                ],
            ],
            'pagination' => ['pageSize' => 15]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'province_id' => $this->province_id,
            'created_on' => $this->created_on,
            'created_by' => $this->created_by,
            'modified_on' => $this->modified_on,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
