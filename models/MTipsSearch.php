<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MTips;

/**
 * MTipsSearch represents the model behind the search form about `app\models\MTips`.
 */
class MTipsSearch extends MTips
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipsId'], 'integer'],
            [['tipsJudul', 'tipsDeskripsi', 'tipsDibuatTgl', 'tipsDibuatOleh', 'tipsStatus'], 'safe'],
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
        $query = MTips::find();

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
            'tipsId' => $this->tipsId,
            'tipsDibuatTgl' => $this->tipsDibuatTgl,
        ]);

        $query->andFilterWhere(['like', 'tipsJudul', $this->tipsJudul])
            ->andFilterWhere(['like', 'tipsDeskripsi', $this->tipsDeskripsi])
            ->andFilterWhere(['like', 'tipsDibuatOleh', $this->tipsDibuatOleh])
            ->andFilterWhere(['like', 'tipsStatus', $this->tipsStatus]);

        return $dataProvider;
    }
}
