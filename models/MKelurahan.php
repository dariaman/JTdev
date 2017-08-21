<?php

namespace app\models;

use Yii;
use app\models\MKecamatan;
/**
 * This is the model class for table "m_kelurahan".
 *
 * @property integer $kelurahanId
 * @property string $kelurahanNama
 * @property integer $kecamatanId
 * @property integer $hargaDaerah
 */
class MKelurahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kelurahan';
    }

    /**
     * @inheritdoc
     */
    public $kotaId;
    public function rules()
    {
        return [
            [['kelurahanNama', 'kecamatanId'], 'required'],
            [['kecamatanId', 'hargaDaerah'], 'integer'],
            [['kelurahanNama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kelurahanId' => 'Kelurahan ID',
            'kelurahanNama' => 'Kelurahan Nama',
            'kecamatanId' => 'Kecamatan ID',
            'hargaDaerah' => 'Harga Daerah',
        ];
    }

    public function getKecamatan()
    {
        return $this->hasOne(MKecamatan::className(), ['kecamatanId' => 'kecamatanId']);
    }

    /**
     * @inheritdoc
     * @return MKelurahanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MKelurahanQuery(get_called_class());
    }
}
