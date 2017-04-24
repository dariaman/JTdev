<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MVideo]].
 *
 * @see MVideo
 */
class MVideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
