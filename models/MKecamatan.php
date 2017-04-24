<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_kecamatan".
 *
 * @property integer $kecamatanId
 * @property string $kecamatanNama
 * @property integer $kotaId
 */
class MKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatanNama', 'kotaId'], 'required'],
            [['kotaId'], 'integer'],
            [['kecamatanNama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kecamatanId' => 'Kecamatan ID',
            'kecamatanNama' => 'Kecamatan Nama',
            'kotaId' => 'Kota ID',
        ];
    }

     public function getKotaTbl(){
            return $this->hasOne(MKota::className(), ['kotaId' => 'kotaId']);
    }

     public function getNamaKota(){
         return $this->kotaTbl != '' ? $this->kotaTbl->kotaNama : 'none';
    }

    /**
     * @inheritdoc
     * @return MKecamatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MKecamatanQuery(get_called_class());
    }
}
