<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MKapasitasDetail;

/**
 * MKapasitasDetailSearch represents the model behind the search form about `app\models\MKapasitasDetail`.
 */
class MKapasitasDetailSearch extends MKapasitasDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kapasitasId', 'kapasitasHarga', 'serviceDetailId'], 'integer'],
            [['kapasitasJudul', 'kapasitasStatus', 'kapasitasDeskripsi'], 'safe'],
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
        $query = MKapasitasDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'kapasitasId' => $this->kapasitasId,
            'kapasitasHarga' => $this->kapasitasHarga,
            'serviceDetailId' => $this->serviceDetailId,
        ]);

        $query->andFilterWhere(['like', 'kapasitasJudul', $this->kapasitasJudul])
            ->andFilterWhere(['like', 'kapasitasStatus', $this->kapasitasStatus])
            ->andFilterWhere(['like', 'kapasitasDeskripsi', $this->kapasitasDeskripsi]);

        return $dataProvider;
    }
}
