<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MShop]].
 *
 * @see MShop
 */
class MShopQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MShop[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MShop|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
