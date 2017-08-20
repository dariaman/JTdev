<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_kota".
 *
 * @property integer $kotaId
 * @property string $kotaNama
 * @property string $Ongkir
 * @property string $DateCrt
 * @property string $DateUpdate
 */
class MKota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kotaNama'], 'required'],
            // [['Ongkir'], 'number'],

            [['Ongkir'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['DateCrt', 'DateUpdate'], 'safe'],
            [['kotaNama'], 'string', 'max' => 100],
        ];
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->Ongkir = str_replace(",", ".", $this->Ongkir);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kotaId' => 'Kota ID',
            'kotaNama' => 'Kota Nama',
            'Ongkir' => 'Ongkir',
            'DateCrt' => 'Date Crt',
            'DateUpdate' => 'Date Update',
        ];
    }

    /**
     * @inheritdoc
     * @return MKotaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MKotaQuery(get_called_class());
    }
}
