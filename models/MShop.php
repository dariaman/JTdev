<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_shop".
 *
 * @property integer $shopId
 * @property string $shopJudul
 * @property string $shopStatus
 */
class MShop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopJudul', 'shopStatus'], 'required'],
            [['shopJudul'], 'string', 'max' => 100],
            [['shopStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shopId' => 'Shop ID',
            'shopJudul' => 'Shop Judul',
            'shopStatus' => 'Shop Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MShopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MShopQuery(get_called_class());
    }
}
