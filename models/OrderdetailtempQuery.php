<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Orderdetailtemp]].
 *
 * @see Orderdetailtemp
 */
class OrderdetailtempQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Orderdetailtemp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orderdetailtemp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
