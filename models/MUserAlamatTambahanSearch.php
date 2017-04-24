<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MUserAlamatTambahan;

/**
 * MUserAlamatTambahanSearch represents the model behind the search form about `app\models\MUserAlamatTambahan`.
 */
class MUserAlamatTambahanSearch extends MUserAlamatTambahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamatId', 'userId'], 'integer'],
            [['userAlamat', 'userKota', 'userKelurahan', 'userKecamatan', 'userDaerah', 'userKodePos'], 'safe'],
            [['alamatStatus'], 'boolean'],
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
        $query = MUserAlamatTambahan::find();

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
            'alamatId' => $this->alamatId,
            'userId' => $this->userId,
            'alamatStatus' => $this->alamatStatus,
        ]);

        $query->andFilterWhere(['like', 'userAlamat', $this->userAlamat])
            ->andFilterWhere(['like', 'userKota', $this->userKota])
            ->andFilterWhere(['like', 'userKelurahan', $this->userKelurahan])
            ->andFilterWhere(['like', 'userKecamatan', $this->userKecamatan])
            ->andFilterWhere(['like', 'userDaerah', $this->userDaerah])
            ->andFilterWhere(['like', 'userKodePos', $this->userKodePos]);

        return $dataProvider;
    }
}
