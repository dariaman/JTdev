<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_shop_detail".
 *
 * @property integer $shopDetailId
 * @property string $shopDetailJudul
 * @property string $shopDetailDeskripsi
 * @property string $shopDetailGambar
 * @property integer $shopId
 * @property string $shopDetailStatus
 */
class MShopDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_shop_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopDetailId', 'shopDetailJudul', 'shopDetailStatus'], 'required'],
            [['shopDetailId', 'shopId'], 'integer'],
            [['shopDetailJudul'], 'string', 'max' => 100],
            [['shopDetailDeskripsi', 'shopDetailGambar'], 'string', 'max' => 200],
            [['shopDetailStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shopDetailId' => 'Shop Detail ID',
            'shopDetailJudul' => 'Shop Detail Judul',
            'shopDetailDeskripsi' => 'Shop Detail Deskripsi',
            'shopDetailGambar' => 'Shop Detail Gambar',
            'shopId' => 'Shop ID',
            'shopDetailStatus' => 'Shop Detail Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MShopDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MShopDetailQuery(get_called_class());
    }
}
