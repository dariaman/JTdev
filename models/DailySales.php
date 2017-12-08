<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "daily_sales".
 *
 * @property string $id
 * @property string $tgl
 * @property string $userid
 * @property string $KategoriId
 * @property string $jlh
 * @property string $paid
 * @property string $unpaid
 * @property string $UserUpdate
 * @property string $DateUpdate
 */
class DailySales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daily_sales';
    }

    /**
     * @inheritdoc
     */
    public $serviceKategoriJudul;
    public $userNamaDepan;
    public $dateTo;
    public $tahun;
    public function rules()
    {
        return [
            [['tgl', 'DateUpdate','dateTo'], 'safe'],
            [['userid', 'KategoriId', 'jlh', 'paid', 'unpaid','tahun'], 'integer'],
            [['UserUpdate'], 'string', 'max' => 200],
            [['tgl', 'userid', 'KategoriId'], 'unique', 'targetAttribute' => ['tgl', 'userid', 'KategoriId'], 'message' => 'The combination of Tgl, Userid and Kategori ID has already been taken.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl',
            'userid' => 'Userid',
            'KategoriId' => 'Kategori ID',
            'jlh' => 'Jlh',
            'paid' => 'Paid',
            'unpaid' => 'Unpaid',
            'UserUpdate' => 'User Update',
            'DateUpdate' => 'Date Update',
        ];
    }

    /**
     * @inheritdoc
     * @return DailySalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DailySalesQuery(get_called_class());
    }
}
