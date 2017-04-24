<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MTestimoni;

/**
 * MTestimoniSearch represents the model behind the search form about `app\models\MTestimoni`.
 */
class MTestimoniSearch extends MTestimoni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testiId'], 'integer'],
            [['testiNama', 'testiPekerjaan', 'testiKonten', 'testiFoto', 'testiStatus'], 'safe'],
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
        $query = MTestimoni::find();

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
            'testiId' => $this->testiId,
        ]);

        $query->andFilterWhere(['like', 'testiNama', $this->testiNama])
            ->andFilterWhere(['like', 'testiPekerjaan', $this->testiPekerjaan])
            ->andFilterWhere(['like', 'testiKonten', $this->testiKonten])
            ->andFilterWhere(['like', 'testiFoto', $this->testiFoto])
            ->andFilterWhere(['like', 'testiStatus', $this->testiStatus]);

        return $dataProvider;
    }
}
