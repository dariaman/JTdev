<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MKota]].
 *
 * @see MKota
 */
class MKotaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MKota[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MKota|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
