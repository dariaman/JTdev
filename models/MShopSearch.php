<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MShop;

/**
 * MShopSearch represents the model behind the search form about `app\models\MShop`.
 */
class MShopSearch extends MShop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopId'], 'integer'],
            [['shopJudul', 'shopStatus'], 'safe'],
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
        $query = MShop::find();

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
            'shopId' => $this->shopId,
        ]);

        $query->andFilterWhere(['like', 'shopJudul', $this->shopJudul])
            ->andFilterWhere(['like', 'shopStatus', $this->shopStatus]);

        return $dataProvider;
    }
}
