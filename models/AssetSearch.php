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
            [['id_asset', 'id_status', 'id_os', 'hard_disk', 'ram', 'id_processor', 'id_model', 'id_asset_type', 'id_parent'], 'integer'],
            [['purchase_date', 'description', 'sales_check', 'create_at', 'currency', 'serial_number', 'ubication'], 'safe'],
            [['price', 'id_leasing'], 'number'],
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
            'price' => $this->price,
            'id_status' => $this->id_status,
            'id_os' => $this->id_os,
            'hard_disk' => $this->hard_disk,
            'ram' => $this->ram,
            'id_processor' => $this->id_processor,
            'id_leasing' => $this->id_leasing,
            'id_model' => $this->id_model,
            'id_asset_type' => $this->id_asset_type,
            'id_parent' => $this->id_parent,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'sales_check', $this->sales_check])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'ubication', $this->ubication]);

        return $dataProvider;
    }
}
