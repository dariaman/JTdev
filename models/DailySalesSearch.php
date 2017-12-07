<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DailySales;

/**
 * DailySalesSearch represents the model behind the search form about `app\models\DailySales`.
 */
class DailySalesSearch extends DailySales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'KategoriId', 'jlh', 'paid', 'unpaid'], 'integer'],
            [['tgl','dateTo', 'UserUpdate', 'DateUpdate'], 'safe'],
//            [['tgl'], 'required'],
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

    public function search($params)
    {
        $query = DailySales::find()
                ->select('mk.`serviceKategoriJudul`,mu.`userNamaDepan`,jlh, paid, unpaid')
                ->leftJoin('m_service_kategori mk', 'mk.`serviceKategoriId`=daily_sales.`KategoriId`')
                ->leftJoin('m_user mu', 'mu.`userId`=daily_sales.`userid`')
                ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if($this->tgl == null) $this->tgl= date("Y-m-d");
        if($this->dateTo == null) $this->dateTo= $this->tgl;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere(['>=', 'tgl', $this->tgl]);
        $query->andFilterWhere(['<=', 'tgl', $this->dateTo]);

        return $dataProvider;
    }
}
