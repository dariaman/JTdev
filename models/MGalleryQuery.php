<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MGallery]].
 *
 * @see MGallery
 */
class MGalleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MGallery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MGallery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
