<?php

namespace app\models;

use Yii;

class TOrder extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 't_order';
    }
    
    public $total;

    public function rules()
    {
        return [
            [['orderTgl'], 'safe'],
            [['orderJenisBayar', 'orderAlamat', 'orderStatus','userId'], 'required'],
            [['orderBiayaTransport', 'orderAlamatTambahanId', 'userId'], 'integer'],
            [['orderJenisBayar', 'orderStatus'], 'string', 'max' => 1],
            [['orderAlamat'], 'string', 'max' => 500],
            [['orderKota', 'orderKelurahan', 'orderKecamatan', 'orderDaerah'], 'string', 'max' => 100],
            [['orderKodePos'], 'string', 'max' => 10],
            [['orderAlamatNote'], 'string', 'max' => 200],
            [['orderGpsKoordinat'], 'string', 'max' => 300],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => MUser::className(), 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'orderId' => 'Order ID',
            'orderTgl' => 'Tanggal Order',
            'orderJenisBayar' => 'Jenis Bayar',
            'orderAlamat' => 'Alamat',
            'orderKota' => 'Kota',
            'orderKelurahan' => 'Kelurahan',
            'orderKecamatan' => 'Kecamatan',
            'orderDaerah' => 'Daerah',
            'orderKodePos' => 'Kode Pos',
            'orderAlamatNote' => 'Alamat Note',
            'orderGpsKoordinat' => 'Gps Koordinat',
            'orderBiayaTransport' => 'Biaya Transport',
            'orderStatus' => 'Status',
            'orderAlamatTambahanId' => 'Alamat Tambahan ID',
            'userId' => 'User Id'
        ];
    }

   public function getMuser() 
   { 
       return $this->hasOne(MUser::className(), ['userId' => 'userId']); 
   }
   
   
   
   public function getKota() 
   { 
       return $this->hasOne(MKota::className(), ['kotaId' => 'orderKota']); 
   }
   
   public function getKec() 
   { 
       return $this->hasOne(MKecamatan::className(), ['kecamatanId' => 'orderKota']); 
   }
   
   public function getKel() 
   { 
       return $this->hasOne(MKelurahan::className(), ['kelurahanId' => 'orderKota']); 
   }

   public function getTOrderDetails() 
   { 
       return $this->hasMany(TOrderDetail::className(), ['orderId' => 'orderId']); 
   }
   
   public static function find()
    {
        return new TOrderQuery(get_called_class());
    }
}
