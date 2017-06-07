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
    public $kotaNama;
    public $kecamatanNama;
    public $kelurahanNama;
    
    public function rules()
    {
        return [
            [['userEmail', 'userNamaDepan', 'userPassword', 'userAlamat'], 'required'],
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
            'userEmail' => 'Email',
            'userNamaDepan' => 'Nama Depan',
            'userNamaBelakang' => 'Nama Belakang',
            'userKelamin' => 'JenisKelamin',
            'userPassword' => 'Password',
            'userAlamat' => 'Alamat',
            'userKota' => 'Kota',
            'userKelurahan' => 'Kelurahan',
            'userKecamatan' => 'Kecamatan',
            'userDaerah' => 'Daerah',
            'userKodePos' => 'Kode Pos',
            'userNoTelp' => 'No Telp',
            'userNoHp' => 'No Hp',
            'userStatus' => 'Status',
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
