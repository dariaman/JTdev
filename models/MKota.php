<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_kota".
 *
 * @property integer $kotaId
 * @property string $kotaNama
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
            [['kotaNama'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kotaId' => 'Kota ID',
            'kotaNama' => 'Kota Nama',
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
