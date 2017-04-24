<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_promo".
 *
 * @property integer $promoId
 * @property string $promoJudul
 * @property string $promoDeskripsi
 * @property string $promoTgl
 * @property string $promoGambarUrl
 * @property string $promoDibuatTgl
 * @property string $promoDibuatOleh
 * @property string $promoStatus
 */
class MPromo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_promo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promoId', 'promoJudul', 'promoDeskripsi', 'promoTgl', 'promoGambarUrl', 'promoDibuatOleh', 'promoStatus'], 'required'],
            [['promoId'], 'integer'],
            [['promoDeskripsi'], 'string'],
            [['promoTgl', 'promoDibuatTgl'], 'safe'],
            [['promoJudul'], 'string', 'max' => 100],
            [['promoGambarUrl', 'promoDibuatOleh'], 'string', 'max' => 200],
            [['promoStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'promoId' => 'Promo ID',
            'promoJudul' => 'Promo Judul',
            'promoDeskripsi' => 'Promo Deskripsi',
            'promoTgl' => 'Promo Tgl',
            'promoGambarUrl' => 'Promo Gambar Url',
            'promoDibuatTgl' => 'Promo Dibuat Tgl',
            'promoDibuatOleh' => 'Promo Dibuat Oleh',
            'promoStatus' => 'Promo Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MPromoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MPromoQuery(get_called_class());
    }
}
