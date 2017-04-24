<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MService;

/**
 * MServiceSearch represents the model behind the search form about `app\models\MService`.
 */
class MServiceSearch extends MService
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serviceId'], 'integer'],
            [['serviceJudul', 'serviceStatus'], 'safe'],
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
        $query = MService::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'serviceId' => $this->serviceId,
        ]);

        $query->andFilterWhere(['like', 'serviceJudul', $this->serviceJudul])
            ->andFilterWhere(['like', 'serviceStatus', $this->serviceStatus]);

        return $dataProvider;
    }
}
