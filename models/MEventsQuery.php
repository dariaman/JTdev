<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MEvents]].
 *
 * @see MEvents
 */
class MEventsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MEvents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MEvents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
