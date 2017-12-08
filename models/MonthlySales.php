<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monthly_sales".
 *
 * @property string $id
 * @property integer $bulan
 * @property integer $tahun
 * @property integer $serviceKategoriId
 * @property integer $serviceDetailId
 * @property integer $jlhWO
 * @property integer $jlhUnit
 * @property integer $unpaid
 * @property integer $paid
 * @property string $dateCrt
 * @property string $dataUpdate
 */
class MonthlySales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monthly_sales';
    }

    /**
     * @inheritdoc
     */
    public $serviceKategoriJudul;
    public $serviceDetailJudul;
    public $woJan,$unJan,$upJan,$pdJan,
        $woFeb,$unFeb,$upFeb,$pdFeb,
        $woMar,$unMar,$upMar,$pdMar,
        $woApr,$unApr,$upApr,$pdApr,
        $woMei,$unMei,$upMei,$pdMei,
        $woJun,$unJun,$upJun,$pdJun,
        $woJul,$unJul,$upJul,$pdJul,
        $woAgs,$unAgs,$upAgs,$pdAgs,
        $woSep,$unSep,$upSep,$pdSep,
        $woOkt,$unOkt,$upOkt,$pdOkt,
        $woNov,$unNov,$upNov,$pdNov,
        $woDes,$unDes,$upDes,$pdDes;
    public function rules()
    {
        return [
            [['bulan', 'tahun', 'serviceKategoriId', 'serviceDetailId'], 'required'],
            [['bulan', 'tahun', 'serviceKategoriId', 'serviceDetailId', 'jlhWO', 'jlhUnit', 'unpaid', 'paid'], 'integer'],
            [['dateCrt', 'dataUpdate'], 'safe'],
            [['bulan', 'tahun', 'serviceKategoriId', 'serviceDetailId'], 'unique', 'targetAttribute' => ['bulan', 'tahun', 'serviceKategoriId', 'serviceDetailId'], 'message' => 'The combination of Bulan, Tahun, Service Kategori ID and Service Detail ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'serviceKategoriId' => 'Service Kategori ID',
            'serviceDetailId' => 'Service Detail ID',
            'jlhWO' => 'Jlh Wo',
            'jlhUnit' => 'Jlh Unit',
            'unpaid' => 'Unpaid',
            'paid' => 'Paid',
            'dateCrt' => 'Date Crt',
            'dataUpdate' => 'Data Update',
        ];
    }

    /**
     * @inheritdoc
     * @return MonthlySalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonthlySalesQuery(get_called_class());
    }
}
