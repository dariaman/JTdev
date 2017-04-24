<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TOrderDetail;

/**
 * TOrderDetailSearch represents the model behind the search form about `app\models\TOrderDetail`.
 */
class TOrderDetailSearch extends TOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderDetailId', 'orderId', 'serviceDetailId', 'kapasitasId', 'orderDetailQTY'], 'integer'],
            [['rekanId', 'orderDetailTglKerja', 'orderDetailWaktuKerja', 'orderDetailKeluhan', 'orderDetailNote', 'orderDetailStatus', 'orderDetailProperti'], 'safe'],
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
        $query = TOrderDetail::find();

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
            'orderDetailId' => $this->orderDetailId,
            'orderId' => $this->orderId,
            'serviceDetailId' => $this->serviceDetailId,
            'kapasitasId' => $this->kapasitasId,
            'orderDetailTglKerja' => $this->orderDetailTglKerja,
            'orderDetailQTY' => $this->orderDetailQTY,
        ]);

        $query->andFilterWhere(['like', 'rekanId', $this->rekanId])
            ->andFilterWhere(['like', 'orderDetailWaktuKerja', $this->orderDetailWaktuKerja])
            ->andFilterWhere(['like', 'orderDetailKeluhan', $this->orderDetailKeluhan])
            ->andFilterWhere(['like', 'orderDetailNote', $this->orderDetailNote])
            ->andFilterWhere(['like', 'orderDetailStatus', $this->orderDetailStatus])
            ->andFilterWhere(['like', 'orderDetailProperti', $this->orderDetailProperti]);

        return $dataProvider;
    }
}
