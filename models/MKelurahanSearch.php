<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MKelurahan;

/**
 * MKelurahanSearch represents the model behind the search form about `app\models\MKelurahan`.
 */
class MKelurahanSearch extends MKelurahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kelurahanId',  'hargaDaerah'], 'integer'],
            [['kelurahanNama','kecamatanId','kotaId'], 'safe'],
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
        $query = MKelurahan::find();
        $query->innerJoin("m_kecamatan", "m_kelurahan.kecamatanId=m_kecamatan.kecamatanId");
        $query->innerJoin("m_kota", "m_kecamatan.kotaId=m_kota.kotaId");
        // $query->joinWith('kecamatan')->joinWith(['comments', 'comments.fan']);

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
            'kelurahanId' => $this->kelurahanId,
            // 'kecamatanId' => $this->kecamatanId,
            // 'hargaDaerah' => $this->hargaDaerah,
        ]);

        $query->andFilterWhere(['like', 'kelurahanNama', $this->kelurahanNama]);
        $query->andFilterWhere(['like', 'm_kecamatan.kecamatanNama', $this->kecamatanId]);
        $query->andFilterWhere(['like', 'm_kota.kotaNama', $this->kotaId]);

        return $dataProvider;
    }
}
