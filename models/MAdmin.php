<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_admin".
 *
 * @property string $adminId
 * @property string $adminPassword
 * @property string $adminNama
 * @property string $adminStatus
 */
class MAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adminId', 'adminPassword', 'adminNama', 'adminStatus'], 'required'],
            [['adminId'], 'string', 'max' => 10],
            [['adminPassword'], 'string', 'max' => 200],
            [['adminNama'], 'string', 'max' => 100],
            [['adminStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adminId' => 'Admin ID',
            'adminPassword' => 'Admin Password',
            'adminNama' => 'Admin Nama',
            'adminStatus' => 'Admin Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MAdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MAdminQuery(get_called_class());
    }
}
