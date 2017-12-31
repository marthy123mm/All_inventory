<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Asset;

/**
 * AssetSearch represents the model behind the search form of `app\models\Asset`.
 */
class AssetSearch extends Asset
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asset', 'status', 'id_asset_type', 'id_model', 'id_leasing'], 'integer'],
            [['purchase_date', 'description', 'sales_check', 'create_at', 'serial_number', 'ubication'], 'safe'],
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
        $query = Asset::find();

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
            'id_asset' => $this->id_asset,
            'purchase_date' => $this->purchase_date,
            'create_at' => $this->create_at,
            'status' => $this->status,
            'id_asset_type' => $this->id_asset_type,
            'id_model' => $this->id_model,
            'id_leasing' => $this->id_leasing,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'sales_check', $this->sales_check])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'ubication', $this->ubication]);

        return $dataProvider;
    }
}
