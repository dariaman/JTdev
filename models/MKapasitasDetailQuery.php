<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MKapasitasDetail]].
 *
 * @see MKapasitasDetail
 */
class MKapasitasDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MKapasitasDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MKapasitasDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
