<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_internet_banking".
 *
 * @property integer $ibankId
 * @property string $ibankJudul
 * @property string $ibankStatus
 */
class MInternetBanking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_internet_banking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ibankId', 'ibankJudul', 'ibankStatus'], 'required'],
            [['ibankId'], 'integer'],
            [['ibankJudul'], 'string', 'max' => 100],
            [['ibankStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ibankId' => 'Ibank ID',
            'ibankJudul' => 'Ibank Judul',
            'ibankStatus' => 'Ibank Status',
        ];
    }
}
