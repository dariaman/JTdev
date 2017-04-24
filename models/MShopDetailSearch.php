<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MShopDetail;

/**
 * MShopDetailSearch represents the model behind the search form about `app\models\MShopDetail`.
 */
class MShopDetailSearch extends MShopDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopDetailId', 'shopId'], 'integer'],
            [['shopDetailJudul', 'shopDetailDeskripsi', 'shopDetailGambar', 'shopDetailStatus'], 'safe'],
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
        $query = MShopDetail::find();

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
            'shopDetailId' => $this->shopDetailId,
            'shopId' => $this->shopId,
        ]);

        $query->andFilterWhere(['like', 'shopDetailJudul', $this->shopDetailJudul])
            ->andFilterWhere(['like', 'shopDetailDeskripsi', $this->shopDetailDeskripsi])
            ->andFilterWhere(['like', 'shopDetailGambar', $this->shopDetailGambar])
            ->andFilterWhere(['like', 'shopDetailStatus', $this->shopDetailStatus]);

        return $dataProvider;
    }
}
