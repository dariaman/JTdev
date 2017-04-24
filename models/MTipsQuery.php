<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MTips]].
 *
 * @see MTips
 */
class MTipsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MTips[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MTips|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
