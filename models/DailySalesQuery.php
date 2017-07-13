<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DailySales]].
 *
 * @see DailySales
 */
class DailySalesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DailySales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DailySales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
