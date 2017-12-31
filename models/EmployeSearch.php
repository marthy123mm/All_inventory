<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employe;

/**
 * EmployeSearch represents the model behind the search form of `app\models\Employe`.
 */
class EmployeSearch extends Employe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_employe', 'status', 'id_department', 'id_office'], 'integer'],
            [['fist_name', 'last_name', 'telephone', 'cellphone', 'email', 'hire_date'], 'safe'],
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
        $query = Employe::find();

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
            'id_employe' => $this->id_employe,
            'hire_date' => $this->hire_date,
            'status' => $this->status,
            'id_department' => $this->id_department,
            'id_office' => $this->id_office,
        ]);

        $query->andFilterWhere(['like', 'fist_name', $this->fist_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'cellphone', $this->cellphone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
