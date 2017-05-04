<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_order_detail".
 *
 * @property integer $orderDetailId
 * @property integer $orderId
 * @property integer $serviceDetailId
 * @property integer $kapasitasId
 * @property integer $rekanId
 * @property string $orderDetailTglKerja
 * @property string $orderDetailWaktuKerja
 * @property string $orderDetailKeluhan
 * @property string $orderDetailNote
 * @property string $orderDetailStatus
 * @property integer $orderDetailQTY
 * @property string $orderDetailProperti
 *
 * @property TOrder $order
 * @property MKapasitasDetail $kapasitas
 * @property MRekanJt $rekan
 * @property MServiceDetail $serviceDetail
 */
class TOrderDetail extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_order_detail';
    }
    public $serviceId;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderId', 'serviceDetailId', 'kapasitasId', 'rekanId', 'orderDetailTglKerja', 'orderDetailWaktuKerja', 'orderDetailStatus'], 'required'],
            [['orderId', 'serviceDetailId', 'kapasitasId', 'rekanId', 'orderDetailQTY'], 'integer'],
            [['orderDetailTglKerja'], 'safe'],
            [['orderDetailWaktuKerja'], 'string', 'max' => 15],
            [['orderDetailKeluhan'], 'string', 'max' => 300],
            [['orderDetailNote', 'orderDetailProperti'], 'string', 'max' => 200],
            [['orderDetailStatus'], 'string', 'max' => 1],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => TOrder::className(), 'targetAttribute' => ['orderId' => 'orderId']],
            [['kapasitasId'], 'exist', 'skipOnError' => true, 'targetClass' => MKapasitasDetail::className(), 'targetAttribute' => ['kapasitasId' => 'kapasitasId']],
            [['rekanId'], 'exist', 'skipOnError' => true, 'targetClass' => MRekanJt::className(), 'targetAttribute' => ['rekanId' => 'rekanId']],
            [['serviceDetailId'], 'exist', 'skipOnError' => true, 'targetClass' => MServiceDetail::className(), 'targetAttribute' => ['serviceDetailId' => 'serviceDetailId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderDetailId' => 'Order Detail ID',
            'orderId' => 'Order ID',
            'serviceDetailId' => 'Service Detail ID',
            'kapasitasId' => 'Kapasitas ID',
            'rekanId' => 'Rekan ID',
            'orderDetailTglKerja' => 'Order Detail Tgl Kerja',
            'orderDetailWaktuKerja' => 'Order Detail Waktu Kerja',
            'orderDetailKeluhan' => 'Order Detail Keluhan',
            'orderDetailNote' => 'Order Detail Note',
            'orderDetailStatus' => 'Order Detail Status',
            'orderDetailQTY' => 'Order Detail Qty',
            'orderDetailProperti' => 'Order Detail Properti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(TOrder::className(), ['orderId' => 'orderId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKapasitas()
    {
        return $this->hasOne(MKapasitasDetail::className(), ['kapasitasId' => 'kapasitasId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekan()
    {
        return $this->hasOne(MRekanJt::className(), ['rekanId' => 'rekanId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceDetail()
    {
        return $this->hasOne(MServiceDetail::className(), ['serviceDetailId' => 'serviceDetailId']);
    }

    /**
     * @inheritdoc
     * @return TOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TOrderQuery(get_called_class());
    }
}
