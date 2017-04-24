<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TOrderDetail]].
 *
 * @see TOrderDetail
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TOrderDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TOrderDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
