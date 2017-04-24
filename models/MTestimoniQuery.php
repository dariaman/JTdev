<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MTestimoni]].
 *
 * @see MTestimoni
 */
class MTestimoniQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MTestimoni[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MTestimoni|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
