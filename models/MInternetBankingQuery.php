<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MKartuDebitKredit]].
 *
 * @see MKartuDebitKredit
 */
class MInternetBankingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MKartuDebitKredit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MKartuDebitKredit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
