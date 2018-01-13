<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Os;

/**
 * OsSearch represents the model behind the search form of `app\models\Os`.
 */
class OsSearch extends Os
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_os'], 'integer'],
            [['os_name', 'description'], 'safe'],
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
        $query = Os::find();

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
            'id_os' => $this->id_os,
        ]);

        $query->andFilterWhere(['like', 'os_name', $this->os_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
