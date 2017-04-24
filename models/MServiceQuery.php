<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MService]].
 *
 * @see MService
 */
class MServiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MService[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MService|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
