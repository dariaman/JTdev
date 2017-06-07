<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MServiceDetail;

/**
 * MServiceDetailSearch represents the model behind the search form about `app\models\MServiceDetail`.
 */
class MServiceDetailSearch extends MServiceDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serviceDetailId', 'serviceKategoriId', 'serviceId'], 'integer'],
            [['serviceDetailJudul', 'serviceDetailDeskripsi', 'serviceDetailGambar', 'serviceDetailStatus'], 'safe'],
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
        $query = MServiceDetail::find()
                ->select('*')
                ->from('m_service_detail msd')
                ->leftJoin('m_service ms','ms.serviceId = msd.serviceId')
                ->leftJoin('m_service_kategori msk','msk.serviceKategoriId = msd.serviceKategoriId')
                ;

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
            'serviceDetailId' => $this->serviceDetailId,
            'serviceKategoriId' => $this->serviceKategoriId,
            'serviceId' => $this->serviceId,
        ]);

        $query->andFilterWhere(['like', 'serviceDetailJudul', $this->serviceDetailJudul])
            ->andFilterWhere(['like', 'serviceDetailDeskripsi', $this->serviceDetailDeskripsi])
            ->andFilterWhere(['like', 'serviceDetailGambar', $this->serviceDetailGambar])
            ->andFilterWhere(['like', 'serviceDetailStatus', $this->serviceDetailStatus]);

        return $dataProvider;
    }
}
