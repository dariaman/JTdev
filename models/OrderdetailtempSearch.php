<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orderdetailtemp;

/**
 * OrderdetailtempSearch represents the model behind the search form about `app\models\Orderdetailtemp`.
 */
class OrderdetailtempSearch extends Orderdetailtemp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'serviceDetailId', 'kapasitasId', 'QTY'], 'integer'],
            [['TglKerja', 'WaktuKerja', 'Keluhan', 'DetailProperti'], 'safe'],
            [['totalHarga'], 'number'],
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
        $query = Orderdetailtemp::find();

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
            'id' => $this->id,
            'serviceDetailId' => $this->serviceDetailId,
            'kapasitasId' => $this->kapasitasId,
            'TglKerja' => $this->TglKerja,
            'WaktuKerja' => $this->WaktuKerja,
            'QTY' => $this->QTY,
            'totalHarga' => $this->totalHarga,
        ]);

        $query->andFilterWhere(['like', 'Keluhan', $this->Keluhan])
            ->andFilterWhere(['like', 'DetailProperti', $this->DetailProperti]);

        return $dataProvider;
    }
}
