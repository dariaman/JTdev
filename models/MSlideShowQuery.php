<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MSlideShow]].
 *
 * @see MSlideShow
 */
class MSlideShowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MSlideShow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MSlideShow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
