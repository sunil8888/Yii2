<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Properties;

/**
 * PropertiesSearch represents the model behind the search form of `frontend\models\Properties`.
 */
class PropertiesSearch extends Properties
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p_id', 'p_user_id', 'p_cat_id', 'p_country_id', 'p_city_id', 'p_state_id'], 'integer'],
            [['p_title', 'p_description', 'p_images', 'p_price', 'p_zip', 'status', 'p_bedrooms', 'p_bathrooms', 'p_features', 'created_at', 'updated_at'], 'safe'],
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
        $query = Properties::find();

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
            'p_id' => $this->p_id,
            'p_user_id' => $this->p_user_id,
            'p_cat_id' => $this->p_cat_id,
            'p_country_id' => $this->p_country_id,
            'p_city_id' => $this->p_city_id,
            'p_state_id' => $this->p_state_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'p_title', $this->p_title])
            ->andFilterWhere(['like', 'p_description', $this->p_description])
            ->andFilterWhere(['like', 'p_images', $this->p_images])
            ->andFilterWhere(['like', 'p_price', $this->p_price])
            ->andFilterWhere(['like', 'p_zip', $this->p_zip])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'p_bedrooms', $this->p_bedrooms])
            ->andFilterWhere(['like', 'p_bathrooms', $this->p_bathrooms])
            ->andFilterWhere(['like', 'p_features', $this->p_features]);

        return $dataProvider;
    }
}
