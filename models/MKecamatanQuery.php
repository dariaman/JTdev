<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MKecamatan]].
 *
 * @see MKecamatan
 */
class MKecamatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MKecamatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MKecamatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
