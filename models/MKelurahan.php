<?php

namespace app\models;

use Yii;

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
    public function rules()
    {
        return [
            [['kelurahanNama', 'kecamatanId', 'hargaDaerah'], 'required'],
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

    /**
     * @inheritdoc
     * @return MKelurahanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MKelurahanQuery(get_called_class());
    }
}
