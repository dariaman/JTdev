<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voucher".
 *
 * @property string $voucherNo
 * @property integer $amount
 * @property string $orderId
 */
class Voucher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voucher';
    }

    /**
     * @inheritdoc
     */
    public $count;
    public function rules()
    {
        return [
            [['voucherNo'], 'required'],
            [['amount', 'orderId','count'], 'integer'],
            [['voucherNo'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voucherNo' => 'Voucher No',
            'amount' => 'Amount',
            'orderId' => 'Order ID',
        ];
    }
}
