<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MUserAlamatTambahan]].
 *
 * @see MUserAlamatTambahan
 */
class MUserAlamatTambahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MUserAlamatTambahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MUserAlamatTambahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
