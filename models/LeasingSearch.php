<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Leasing;

/**
 * LeasingSearch represents the model behind the search form of `app\models\Leasing`.
 */
class LeasingSearch extends Leasing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_leasing', 'id_provider'], 'integer'],
            [['leasing_number', 'months', 'start_date', 'end_date'], 'safe'],
            [['payment'], 'number'],
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
        $query = Leasing::find();

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
            'id_leasing' => $this->id_leasing,
            'payment' => $this->payment,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'id_provider' => $this->id_provider,
        ]);

        $query->andFilterWhere(['like', 'leasing_number', $this->leasing_number])
            ->andFilterWhere(['like', 'months', $this->months]);

        return $dataProvider;
    }
}
