<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderdetailtemp".
 *
 * @property string $id
 * @property integer $serviceDetailId
 * @property integer $kapasitasId
 * @property string $TglKerja
 * @property string $WaktuKerja
 * @property string $Keluhan
 * @property integer $QTY
 * @property string $DetailProperti
 * @property string $totalHarga
 */
class Orderdetailtemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderdetailtemp';
    }

    /**
     * @inheritdoc
     */
    public $serviceId;
    public function rules()
    {
        return [
            [['serviceDetailId', 'kapasitasId', 'TglKerja', 'WaktuKerja'], 'required'],
            [['serviceDetailId', 'kapasitasId', 'QTY'], 'integer'],
            [['TglKerja', 'WaktuKerja'], 'safe'],
            [['totalHarga'], 'number'],
            [['Keluhan'], 'string', 'max' => 300],
            [['DetailProperti'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serviceDetailId' => 'Service Detail ID',
            'kapasitasId' => 'Kapasitas ID',
            'TglKerja' => 'Tgl Kerja',
            'WaktuKerja' => 'Waktu Kerja',
            'Keluhan' => 'Keluhan',
            'QTY' => 'Qty',
            'DetailProperti' => 'Detail Properti',
            'totalHarga' => 'Total Harga',
        ];
    }
}
