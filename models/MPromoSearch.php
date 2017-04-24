<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MPromo;

/**
 * MPromoSearch represents the model behind the search form about `app\models\MPromo`.
 */
class MPromoSearch extends MPromo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promoId'], 'integer'],
            [['promoJudul', 'promoDeskripsi', 'promoTgl', 'promoGambarUrl', 'promoDibuatTgl', 'promoDibuatOleh', 'promoStatus'], 'safe'],
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
        $query = MPromo::find();

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
            'promoId' => $this->promoId,
            'promoTgl' => $this->promoTgl,
            'promoDibuatTgl' => $this->promoDibuatTgl,
        ]);

        $query->andFilterWhere(['like', 'promoJudul', $this->promoJudul])
            ->andFilterWhere(['like', 'promoDeskripsi', $this->promoDeskripsi])
            ->andFilterWhere(['like', 'promoGambarUrl', $this->promoGambarUrl])
            ->andFilterWhere(['like', 'promoDibuatOleh', $this->promoDibuatOleh])
            ->andFilterWhere(['like', 'promoStatus', $this->promoStatus]);

        return $dataProvider;
    }
}
