<?php
namespace app\models;
use Yii;
use app\models\MService;
/**
 * This is the model class for table "m_service_kategori".
 *
 * @property integer $serviceKategoriId
 * @property string $serviceKategoriJudul
 * @property string $serviceKategoriGambarUrl
 * @property string $serviceKategoriStatus
 * @property integer $serviceId
 */
class MServiceKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_service_kategori';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serviceKategoriJudul', 'serviceKategoriGambarUrl', 'serviceKategoriStatus', 'serviceId'], 'required'],
            [['serviceId'], 'integer'],
            [['serviceKategoriJudul'], 'string', 'max' => 100],
            [['serviceKategoriGambarUrl'], 'string', 'max' => 200],
            [['serviceKategoriStatus'], 'string', 'max' => 1],
        ];
    }
      public function getServiceTbl(){
        return $this->hasOne(MService::className(), ['serviceId' => 'serviceId']);
    }
     public function getServiceNama(){
         return $this->serviceTbl != '' ? $this->serviceTbl->serviceJudul : 'none';
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serviceKategoriId' => 'Service Kategori ID',
            'serviceKategoriJudul' => 'Service Kategori Judul',
            'serviceKategoriGambarUrl' => 'Service Kategori Gambar Url',
            'serviceKategoriStatus' => 'Service Kategori Status',
            'serviceId' => 'Service ID',
        ];
    }
    /**
     * @inheritdoc
     * @return MServiceKategoriQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MServiceKategoriQuery(get_called_class());
    }
}