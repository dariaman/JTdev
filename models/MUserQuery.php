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

    public function aktif()
    {
        $this->andWhere(['=', 'userStatus', '1']);

        return $this;
    }
    
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
