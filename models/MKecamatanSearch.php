<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MKecamatan;

/**
 * MKecamatanSearch represents the model behind the search form about `app\models\MKecamatan`.
 */
class MKecamatanSearch extends MKecamatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatanId', 'kotaId'], 'integer'],
            [['kecamatanNama'], 'safe'],
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
        $query = MKecamatan::find();

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
            'kecamatanId' => $this->kecamatanId,
            'kotaId' => $this->kotaId,
        ]);

        $query->andFilterWhere(['like', 'kecamatanNama', $this->kecamatanNama]);

        return $dataProvider;
    }
}
