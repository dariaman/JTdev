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
            [['id', 'userid', 'KategoriId', 'jlh', 'paid', 'unpaid','tahun'], 'integer'],
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
    
    public function searchmonthly($params) {
        $query = MonthlySales::find()
                ->select('monthly_sales.`id`,mk.`serviceKategoriJudul`,md.`serviceDetailJudul`,
                        (CASE WHEN monthly_sales.`bulan`= 1 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woJan,
                        (CASE WHEN monthly_sales.`bulan`= 1 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unJan,
                        (CASE WHEN monthly_sales.`bulan`= 1 THEN monthly_sales.`unpaid` ELSE 0 END) AS upJan,
                        (CASE WHEN monthly_sales.`bulan`= 1 THEN monthly_sales.`paid` ELSE 0 END) AS pdJan,

                        (CASE WHEN monthly_sales.`bulan`= 2 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woFeb,
                        (CASE WHEN monthly_sales.`bulan`= 2 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unFeb,
                        (CASE WHEN monthly_sales.`bulan`= 2 THEN monthly_sales.`unpaid` ELSE 0 END) AS upFeb,
                        (CASE WHEN monthly_sales.`bulan`= 2 THEN monthly_sales.`paid` ELSE 0 END) AS pdFeb,

                        (CASE WHEN monthly_sales.`bulan`= 3 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woMar,
                        (CASE WHEN monthly_sales.`bulan`= 3 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unMar,
                        (CASE WHEN monthly_sales.`bulan`= 3 THEN monthly_sales.`unpaid` ELSE 0 END) AS upMar,
                        (CASE WHEN monthly_sales.`bulan`= 3 THEN monthly_sales.`paid` ELSE 0 END) AS pdMar,

                        (CASE WHEN monthly_sales.`bulan`= 4 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woApr,
                        (CASE WHEN monthly_sales.`bulan`= 4 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unApr,
                        (CASE WHEN monthly_sales.`bulan`= 4 THEN monthly_sales.`unpaid` ELSE 0 END) AS upApr,
                        (CASE WHEN monthly_sales.`bulan`= 4 THEN monthly_sales.`paid` ELSE 0 END) AS pdApr,

                        (CASE WHEN monthly_sales.`bulan`= 5 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woMei,
                        (CASE WHEN monthly_sales.`bulan`= 5 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unMei,
                        (CASE WHEN monthly_sales.`bulan`= 5 THEN monthly_sales.`unpaid` ELSE 0 END) AS upMei,
                        (CASE WHEN monthly_sales.`bulan`= 5 THEN monthly_sales.`paid` ELSE 0 END) AS pdMei,

                        (CASE WHEN monthly_sales.`bulan`= 6 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woJun,
                        (CASE WHEN monthly_sales.`bulan`= 6 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unJun,
                        (CASE WHEN monthly_sales.`bulan`= 6 THEN monthly_sales.`unpaid` ELSE 0 END) AS upJun,
                        (CASE WHEN monthly_sales.`bulan`= 6 THEN monthly_sales.`paid` ELSE 0 END) AS pdJun,

                        (CASE WHEN monthly_sales.`bulan`= 7 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woJul,
                        (CASE WHEN monthly_sales.`bulan`= 7 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unJul,
                        (CASE WHEN monthly_sales.`bulan`= 7 THEN monthly_sales.`unpaid` ELSE 0 END) AS upJul,
                        (CASE WHEN monthly_sales.`bulan`= 7 THEN monthly_sales.`paid` ELSE 0 END) AS pdJul,

                        (CASE WHEN monthly_sales.`bulan`= 8 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woAgs,
                        (CASE WHEN monthly_sales.`bulan`= 8 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unAgs,
                        (CASE WHEN monthly_sales.`bulan`= 8 THEN monthly_sales.`unpaid` ELSE 0 END) AS upAgs,
                        (CASE WHEN monthly_sales.`bulan`= 8 THEN monthly_sales.`paid` ELSE 0 END) AS pdAgs,

                        (CASE WHEN monthly_sales.`bulan`= 9 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woSep,
                        (CASE WHEN monthly_sales.`bulan`= 9 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unSep,
                        (CASE WHEN monthly_sales.`bulan`= 9 THEN monthly_sales.`unpaid` ELSE 0 END) AS upSep,
                        (CASE WHEN monthly_sales.`bulan`= 9 THEN monthly_sales.`paid` ELSE 0 END) AS pdSep,

                        (CASE WHEN monthly_sales.`bulan`= 10 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woOkt,
                        (CASE WHEN monthly_sales.`bulan`= 10 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unOkt,
                        (CASE WHEN monthly_sales.`bulan`= 10 THEN monthly_sales.`unpaid` ELSE 0 END) AS upOkt,
                        (CASE WHEN monthly_sales.`bulan`= 10 THEN monthly_sales.`paid` ELSE 0 END) AS pdOkt,

                        (CASE WHEN monthly_sales.`bulan`= 11 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woNov,
                        (CASE WHEN monthly_sales.`bulan`= 11 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unNov,
                        (CASE WHEN monthly_sales.`bulan`= 11 THEN monthly_sales.`unpaid` ELSE 0 END) AS upNov,
                        (CASE WHEN monthly_sales.`bulan`= 11 THEN monthly_sales.`paid` ELSE 0 END) AS pdNov,

                        (CASE WHEN monthly_sales.`bulan`= 12 THEN monthly_sales.`jlhWO` ELSE 0 END) AS woDes,
                        (CASE WHEN monthly_sales.`bulan`= 12 THEN monthly_sales.`jlhUnit` ELSE 0 END) AS unDes,
                        (CASE WHEN monthly_sales.`bulan`= 12 THEN monthly_sales.`unpaid` ELSE 0 END) AS upDes,
                        (CASE WHEN monthly_sales.`bulan`= 12 THEN monthly_sales.`paid` ELSE 0 END) AS pdDes')
                ->leftJoin('m_service_kategori mk', 'mk.`serviceKategoriId`=monthly_sales.`serviceKategoriId`')
                ->leftJoin('m_service_detail md', 'md.`serviceDetailId`=monthly_sales.`serviceDetailId`')
                ->orderBy(['monthly_sales.`serviceKategoriId`'=>SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['=', 'monthly_sales.`tahun`', $this->tahun]);

        return $dataProvider;
    }
    
    
}
