<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MAdmin;

/**
 * MAdminSearch represents the model behind the search form about `app\models\MAdmin`.
 */
class MAdminSearch extends MAdmin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adminId', 'adminPassword', 'adminNama', 'adminStatus'], 'safe'],
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
        $query = MAdmin::find();

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
        $query->andFilterWhere(['like', 'adminId', $this->adminId])
            ->andFilterWhere(['like', 'adminPassword', $this->adminPassword])
            ->andFilterWhere(['like', 'adminNama', $this->adminNama])
            ->andFilterWhere(['like', 'adminStatus', $this->adminStatus]);

        return $dataProvider;
    }
}
