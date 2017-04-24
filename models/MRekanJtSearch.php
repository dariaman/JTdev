<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MRekanJt;

/**
 * MRekanJtSearch represents the model behind the search form about `app\models\MRekanJt`.
 */
class MRekanJtSearch extends MRekanJt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rekanId'], 'integer'],
            [['rekanNamaLengkap', 'rekanKelamin', 'rekanSpesifikasi', 'rekanAlamat', 'rekanEmail', 'rekanWebsite', 'rekanKota', 'rekanKelurahan', 'rekanKecamatan', 'rekanDaerah', 'rekanKodePos', 'rekanNoHp', 'rekanKendaraan', 'rekanKendaraanNopol', 'rekanStatus'], 'safe'],
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
        $query = MRekanJt::find();

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
            'rekanId' => $this->rekanId,
        ]);

        $query->andFilterWhere(['like', 'rekanNamaLengkap', $this->rekanNamaLengkap])
            ->andFilterWhere(['like', 'rekanKelamin', $this->rekanKelamin])
            ->andFilterWhere(['like', 'rekanSpesifikasi', $this->rekanSpesifikasi])
            ->andFilterWhere(['like', 'rekanAlamat', $this->rekanAlamat])
            ->andFilterWhere(['like', 'rekanEmail', $this->rekanEmail])
            ->andFilterWhere(['like', 'rekanWebsite', $this->rekanWebsite])
            ->andFilterWhere(['like', 'rekanKota', $this->rekanKota])
            ->andFilterWhere(['like', 'rekanKelurahan', $this->rekanKelurahan])
            ->andFilterWhere(['like', 'rekanKecamatan', $this->rekanKecamatan])
            ->andFilterWhere(['like', 'rekanDaerah', $this->rekanDaerah])
            ->andFilterWhere(['like', 'rekanKodePos', $this->rekanKodePos])
            ->andFilterWhere(['like', 'rekanNoHp', $this->rekanNoHp])
            ->andFilterWhere(['like', 'rekanKendaraan', $this->rekanKendaraan])
            ->andFilterWhere(['like', 'rekanKendaraanNopol', $this->rekanKendaraanNopol])
            ->andFilterWhere(['like', 'rekanStatus', $this->rekanStatus]);

        return $dataProvider;
    }
}
