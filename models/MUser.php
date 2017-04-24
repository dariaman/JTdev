<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_user".
 *
 * @property integer $userId
 * @property string $userEmail
 * @property string $userNamaDepan
 * @property string $userNamaBelakang
 * @property string $userKelamin
 * @property string $userPassword
 * @property string $userAlamat
 * @property string $userKota
 * @property string $userKelurahan
 * @property string $userKecamatan
 * @property string $userDaerah
 * @property string $userKodePos
 * @property string $userNoTelp
 * @property string $userNoHp
 * @property string $userStatus
 */
class MUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userEmail', 'userNamaDepan', 'userKelamin', 'userPassword', 'userAlamat', 'userKota', 'userKelurahan', 'userKecamatan', 'userDaerah', 'userKodePos', 'userNoTelp', 'userNoHp', 'userStatus'], 'required'],
            [['userEmail', 'userPassword'], 'string', 'max' => 200],
            [['userNamaDepan', 'userNamaBelakang', 'userKota', 'userKelurahan', 'userKecamatan', 'userDaerah'], 'string', 'max' => 100],
            [['userKelamin', 'userStatus'], 'string', 'max' => 1],
            [['userAlamat'], 'string', 'max' => 500],
            [['userKodePos'], 'string', 'max' => 10],
            [['userNoTelp', 'userNoHp'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'userEmail' => 'User Email',
            'userNamaDepan' => 'User Nama Depan',
            'userNamaBelakang' => 'User Nama Belakang',
            'userKelamin' => 'User Kelamin',
            'userPassword' => 'User Password',
            'userAlamat' => 'User Alamat',
            'userKota' => 'User Kota',
            'userKelurahan' => 'User Kelurahan',
            'userKecamatan' => 'User Kecamatan',
            'userDaerah' => 'User Daerah',
            'userKodePos' => 'User Kode Pos',
            'userNoTelp' => 'User No Telp',
            'userNoHp' => 'User No Hp',
            'userStatus' => 'User Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MUserQuery(get_called_class());
    }
}
