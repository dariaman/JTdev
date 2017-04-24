<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_testimoni".
 *
 * @property integer $testiId
 * @property string $testiNama
 * @property string $testiPekerjaan
 * @property string $testiKonten
 * @property string $testiFoto
 * @property string $testiStatus
 */
class MTestimoni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_testimoni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testiNama', 'testiKonten', 'testiStatus'], 'required'],
            [['testiKonten'], 'string'],
            [['testiNama', 'testiPekerjaan'], 'string', 'max' => 100],
            [['testiFoto'], 'string', 'max' => 200],
            [['testiStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'testiId' => 'Testi ID',
            'testiNama' => 'Testi Nama',
            'testiPekerjaan' => 'Testi Pekerjaan',
            'testiKonten' => 'Testi Konten',
            'testiFoto' => 'Testi Foto',
            'testiStatus' => 'Testi Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MTestimoniQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MTestimoniQuery(get_called_class());
    }
}
