<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TypeAsset;

/**
 * TypeAssetSearch represents the model behind the search form of `app\models\TypeAsset`.
 */
class TypeAssetSearch extends TypeAsset
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type_asset'], 'integer'],
            [['type', 'description', 'icon'], 'safe'],
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
        $query = TypeAsset::find();

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
            'id_type_asset' => $this->id_type_asset,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
