<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "m_service_detail".
 *
 * @property integer $serviceDetailId
 * @property string $serviceDetailJudul
 * @property string $serviceDetailDeskripsi
 * @property string $serviceDetailGambar
 * @property integer $serviceKategoriId
 * @property integer $serviceId
 * @property string $serviceDetailStatus
 */
class MServiceDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_service_detail';
    }
    /**
     * @inheritdoc
     */
    public $serviceJudul;
    public $serviceKategoriJudul;
    public $pic;
    public function rules()
    {
        return [
            [['serviceDetailJudul', 'serviceKategoriId', 'serviceId', 'serviceDetailStatus'], 'required'],
            [['serviceDetailDeskripsi'], 'string'],
            [['serviceKategoriId', 'serviceId'], 'integer'],
            [['serviceDetailJudul'], 'string', 'max' => 100],
            [['serviceDetailGambar'], 'string', 'max' => 200],
            [['serviceDetailStatus'], 'string', 'max' => 1],
            [['pic'], 'file'],
        ];
    }
    
     public function getKategoriTbl(){
        return $this->hasOne(MServiceKategori::className(), ['serviceKategoriId' => 'serviceKategoriId']);
    }
    public function getServiceTbl(){
            return $this->hasOne(MService::className(), ['serviceId' => 'serviceId'])
            ->via('kategoriTbl');
        }
    public function getServicejudulheader(){
              return $this->serviceTbl != '' ? $this->serviceTbl->serviceJudul : 'none';
    }
     public function getServiceJudul(){
         return $this->kategoriTbl != '' ? $this->kategoriTbl->serviceKategoriJudul : 'none';
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serviceDetailId' => 'Service Detail ID',
            'serviceDetailJudul' => 'Service Detail Judul',
            'serviceDetailDeskripsi' => 'Service Detail Deskripsi',
            'serviceDetailGambar' => 'Service Detail Gambar',
            'serviceKategoriId' => 'Service Kategori ID',
            'serviceId' => 'Service ID',
            'serviceDetailStatus' => 'Service Detail Status',
        ];
    }
    /**
     * @inheritdoc
     * @return MServiceDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MServiceDetailQuery(get_called_class());
    }
}