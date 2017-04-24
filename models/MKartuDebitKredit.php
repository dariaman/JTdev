<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_kartu_debit_kredit".
 *
 * @property integer $kartuId
 * @property string $kartuJudul
 * @property string $kartuStatus
 */
class MKartuDebitKredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kartu_debit_kredit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kartuJudul', 'kartuStatus'], 'required'],
            [['kartuJudul'], 'string', 'max' => 100],
            [['kartuStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kartuId' => 'Kartu ID',
            'kartuJudul' => 'Kartu Judul',
            'kartuStatus' => 'Kartu Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MInternetBankingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MInternetBankingQuery(get_called_class());
    }
}
