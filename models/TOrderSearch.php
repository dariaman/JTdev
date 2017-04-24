<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use app\models\TOrder;
use app\models\TOrderDetail;
use app\models\User;

/**
 * TOrderSearch represents the model behind the search form about `app\models\TOrder`.
 */
class TOrderSearch extends TOrder
{
//    public $userNamaDepan;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderId', 'orderBiayaTransport'], 'integer'],
            [['orderTgl', 'orderJenisBayar', 'orderAlamat', 'orderKota', 'orderKelurahan', 'orderKecamatan', 'orderDaerah', 
                'userNamaDepan','orderKodePos', 'orderAlamatNote', 'orderGpsKoordinat', 'orderStatus'], 'safe'],
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
        $query = TOrder::find()
                ->joinWith(['muser']);
//                ->joinWith('tOrderDetails', TRUE, 'Left Join');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['orderId'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'orderId' => $this->orderId,
            'orderTgl' => $this->orderTgl,
            'orderBiayaTransport' => $this->orderBiayaTransport,
            'orderAlamatTambahanId' => $this->orderAlamatTambahanId,
        ]);

        $query->andFilterWhere(['like', 'orderJenisBayar', $this->orderJenisBayar])
            ->andFilterWhere(['like', 'orderAlamat', $this->orderAlamat])
            ->andFilterWhere(['like', 'orderKota', $this->orderKota])
            ->andFilterWhere(['like', 'orderKelurahan', $this->orderKelurahan])
            ->andFilterWhere(['like', 'orderKecamatan', $this->orderKecamatan])
            ->andFilterWhere(['like', 'orderDaerah', $this->orderDaerah])
            ->andFilterWhere(['like', 'orderKodePos', $this->orderKodePos])
            ->andFilterWhere(['like', 'orderAlamatNote', $this->orderAlamatNote])
            ->andFilterWhere(['like', 'orderGpsKoordinat', $this->orderGpsKoordinat])
            ->andFilterWhere(['like', 'orderStatus', $this->orderStatus]);

        return $dataProvider;
    } 
    
    public function searchDetail($id)
    {
//        $query = TOrderDetail::find()->where(['orderId' => $id]);
        $query = (new \yii\db\Query)
                ->select("tx.`orderDetailId` AS id,
                    tx.`orderId`,
                    md.`serviceDetailJudul`,
                    kd.`kapasitasJudul`,
                    tx.`orderDetailTglKerja`,
                    tx.`orderDetailWaktuKerja`,
                    tx.`orderDetailQTY`,
                    tx.`orderDetailKeluhan`")
                ->from('t_order_detail tx')
                ->leftJoin("`m_service_detail` md","md.`serviceDetailId`=tx.`serviceDetailId`")
                ->leftJoin("`m_kapasitas_detail` kd","kd.`kapasitasId`=tx.`kapasitasId`")
                ->where("tx.`orderId`=".$id)
                ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($id);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'orderId' => $this->orderId,
            'orderTgl' => $this->orderTgl,
            'orderBiayaTransport' => $this->orderBiayaTransport,
            'orderAlamatTambahanId' => $this->orderAlamatTambahanId,
        ]);

        $query->andFilterWhere(['like', 'orderJenisBayar', $this->orderJenisBayar])
            ->andFilterWhere(['like', 'orderAlamat', $this->orderAlamat])
            ->andFilterWhere(['like', 'orderKota', $this->orderKota])
            ->andFilterWhere(['like', 'orderKelurahan', $this->orderKelurahan])
            ->andFilterWhere(['like', 'orderKecamatan', $this->orderKecamatan])
            ->andFilterWhere(['like', 'orderDaerah', $this->orderDaerah])
            ->andFilterWhere(['like', 'orderKodePos', $this->orderKodePos])
            ->andFilterWhere(['like', 'orderAlamatNote', $this->orderAlamatNote])
            ->andFilterWhere(['like', 'orderGpsKoordinat', $this->orderGpsKoordinat])
            ->andFilterWhere(['like', 'orderStatus', $this->orderStatus]);

        return $dataProvider;

    }
    
    public function searchWo($params)
    {
        $query = (new \yii\db\Query)
                ->select("tx.orderDetailId,
                        tt.orderId,
                        tx.`rekanId`,
                        mu.`userNamaDepan`,
                        tt.`orderTgl`,
                        mk.`kotaNama`,
                        ms.`serviceJudul`,
                        mg.`serviceKategoriJudul`,
                        md.`serviceDetailJudul`,
                        mr.`rekanNamaLengkap`")
                ->from('t_order_detail tx')
                ->leftJoin("`t_order` tt ","tt.`orderId`=tx.`orderId`")
                ->leftJoin("`m_user` mu "," mu.`userId`=tt.`userId`")
                ->leftJoin("`m_kota` mk "," mk.`kotaId`=tt.`orderKota`")
                ->leftJoin("`m_service_detail` md "," md.`serviceDetailId`=tx.`serviceDetailId`")
                ->leftJoin("`m_service_kategori` mg "," mg.`serviceKategoriId`=md.`serviceKategoriId`")
                ->leftJoin("`m_service` ms "," ms.`serviceId`=md.`serviceId`")
                ->leftJoin("`m_rekan_jt` mr "," tx.`rekanId`=mr.`rekanId`")
                ->groupBy(['tt.orderId','tx.rekanId'])
                ->orderBy(['tt.orderId'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'orderId' => $this->orderId,
            'orderTgl' => $this->orderTgl,
            'orderBiayaTransport' => $this->orderBiayaTransport,
            'orderAlamatTambahanId' => $this->orderAlamatTambahanId,
        ]);

        $query->andFilterWhere(['like', 'orderJenisBayar', $this->orderJenisBayar])
            ->andFilterWhere(['like', 'orderAlamat', $this->orderAlamat])
            ->andFilterWhere(['like', 'orderKota', $this->orderKota])
            ->andFilterWhere(['like', 'orderKelurahan', $this->orderKelurahan])
            ->andFilterWhere(['like', 'orderKecamatan', $this->orderKecamatan])
            ->andFilterWhere(['like', 'orderDaerah', $this->orderDaerah])
            ->andFilterWhere(['like', 'orderKodePos', $this->orderKodePos])
            ->andFilterWhere(['like', 'orderAlamatNote', $this->orderAlamatNote])
            ->andFilterWhere(['like', 'orderGpsKoordinat', $this->orderGpsKoordinat])
            ->andFilterWhere(['like', 'orderStatus', $this->orderStatus]);

        return $dataProvider;
    }
}
