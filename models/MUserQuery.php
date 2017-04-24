<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MUser]].
 *
 * @see MUser
 */
class MUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
