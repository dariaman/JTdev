<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MServiceKategori]].
 *
 * @see MServiceKategori
 */
class MServiceKategoriQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MServiceKategori[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MServiceKategori|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
