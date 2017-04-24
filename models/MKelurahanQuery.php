<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MKelurahan]].
 *
 * @see MKelurahan
 */
class MKelurahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MKelurahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MKelurahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
