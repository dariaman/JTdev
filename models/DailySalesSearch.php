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
                ->orderBy(['daily_sales.`KategoriId`'=>SORT_ASC,'daily_sales.`userid`'=>SORT_ASC])
                ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if($this->tgl == null) $this->tgl= date("Y-m-d");

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere(['=', 'tgl', $this->tgl]);
//        $query->andFilterWhere(['<=', 'tgl', $this->dateTo]);

        return $dataProvider;
    }

    public function searchweekly($params) {
        $query = DailySales::find()
                ->select('mk.`serviceKategoriJudul`,mu.`userNamaDepan`,SUM(daily_sales.jlh) AS `jlh`, SUM(daily_sales.paid) AS `paid`, SUM(daily_sales.unpaid) AS`unpaid`')
                ->leftJoin('m_service_kategori mk', 'mk.`serviceKategoriId`=daily_sales.`KategoriId`')
                ->leftJoin('m_user mu', 'mu.`userId`=daily_sales.`userid`')
                ->orderBy(['daily_sales.`KategoriId`'=>SORT_ASC,'daily_sales.`userid`'=>SORT_ASC])
                ->groupBy(['daily_sales.`KategoriId`','daily_sales.`userid`'])
                ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if($this->tgl == null) $this->tgl= date("Y-m-d");
        if($this->dateTo == null) $this->dateTo= $this->tgl;

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'tgl', $this->tgl]);
        $query->andFilterWhere(['<=', 'tgl', $this->dateTo]);

        return $dataProvider;
    }
    
    
}
