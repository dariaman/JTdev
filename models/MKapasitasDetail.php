<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "m_kapasitas_detail".
 *
 * @property integer $kapasitasId
 * @property string $kapasitasJudul
 * @property string $kapasitasHarga
 * @property string $kapasitasStatus
 * @property integer $serviceDetailId
 * @property string $kapasitasDeskripsi
 */
class MKapasitasDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kapasitas_detail';
    }
    /**
     * @inheritdoc
     */
    public $serviceDetailJudul;
    public function rules()
    {
        return [
            [['kapasitasJudul', 'kapasitasHarga', 'serviceDetailId'], 'required'],
            [['kapasitasHarga', 'serviceDetailId'], 'integer'],
            [['kapasitasDeskripsi'], 'string'],
            [['kapasitasJudul'], 'string', 'max' => 100],
            [['kapasitasStatus'], 'string', 'max' => 1],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kapasitasId' => 'Kapasitas ID',
            'kapasitasJudul' => 'Kapasitas Judul',
            'kapasitasHarga' => 'Kapasitas Harga',
            'kapasitasStatus' => 'Kapasitas Status',
            'serviceDetailId' => 'Service Detail ID',
            'kapasitasDeskripsi' => 'Kapasitas Deskripsi',
        ];
    }
    public function getServiceDetailTbl(){
            return $this->hasOne(MServiceDetail::className(), ['serviceDetailId' => 'serviceDetailId']);
        }
    public function getServicejuduldetail(){
              return $this->serviceDetailTbl != '' ? $this->serviceDetailTbl->serviceDetailJudul : 'none';
    }
    /**
     * @inheritdoc
     * @return MKapasitasDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MKapasitasDetailQuery(get_called_class());
    }
}