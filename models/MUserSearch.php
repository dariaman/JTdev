<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MUser;

/**
 * MUserSearch represents the model behind the search form about `app\models\MUser`.
 */
class MUserSearch extends MUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId'], 'integer'],
            [['userEmail', 'userNamaDepan', 'userNamaBelakang', 'userKelamin', 'userPassword', 'userAlamat', 'userKota', 'userKelurahan', 'userKecamatan', 'userDaerah', 'userKodePos', 'userNoTelp', 'userNoHp', 'userStatus'], 'safe'],
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
        $query = MUser::find();

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
            'userId' => $this->userId,
        ]);

        $query->andFilterWhere(['like', 'userEmail', $this->userEmail])
            ->andFilterWhere(['like', 'userNamaDepan', $this->userNamaDepan])
            ->andFilterWhere(['like', 'userNamaBelakang', $this->userNamaBelakang])
            ->andFilterWhere(['like', 'userKelamin', $this->userKelamin])
            ->andFilterWhere(['like', 'userPassword', $this->userPassword])
            ->andFilterWhere(['like', 'userAlamat', $this->userAlamat])
            ->andFilterWhere(['like', 'userKota', $this->userKota])
            ->andFilterWhere(['like', 'userKelurahan', $this->userKelurahan])
            ->andFilterWhere(['like', 'userKecamatan', $this->userKecamatan])
            ->andFilterWhere(['like', 'userDaerah', $this->userDaerah])
            ->andFilterWhere(['like', 'userKodePos', $this->userKodePos])
            ->andFilterWhere(['like', 'userNoTelp', $this->userNoTelp])
            ->andFilterWhere(['like', 'userNoHp', $this->userNoHp])
            ->andFilterWhere(['like', 'userStatus', $this->userStatus]);

        return $dataProvider;
    }
}
