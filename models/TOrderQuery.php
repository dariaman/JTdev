<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TOrder]].
 *
 * @see TOrder
 */
class TOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
