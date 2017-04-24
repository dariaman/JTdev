<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MServiceDetail]].
 *
 * @see MServiceDetail
 */
class MServiceDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MServiceDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MServiceDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
