<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DepDrops;

/**
 * DepDropsSearch represents the model behind the search form of `app\models\DepDrops`.
 */
class DepDropsSearch extends DepDrops
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'villages_id', 'subdistricts_id', 'districts_id', 'provinces_id', 'created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
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
        $query = DepDrops::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'villages_id' => $this->villages_id,
            'subdistricts_id' => $this->subdistricts_id,
            'districts_id' => $this->districts_id,
            'provinces_id' => $this->provinces_id,
            'created_on' => $this->created_on,
            'created_by' => $this->created_by,
            'modified_on' => $this->modified_on,
            'modified_by' => $this->modified_by,
        ]);

        return $dataProvider;
    }
}
