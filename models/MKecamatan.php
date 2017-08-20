<?php

namespace app\models;

use Yii;
use app\models\Mkota;

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
            [['kecamatanNama',], 'string', 'max' => 100],
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

    public function getKota()
    {
        return $this->hasOne(Mkota::className(), ['kotaId' => 'kotaId']);
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
