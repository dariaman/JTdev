<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_user_alamat_tambahan".
 *
 * @property integer $alamatId
 * @property integer $userId
 * @property string $userAlamat
 * @property string $userKota
 * @property string $userKelurahan
 * @property string $userKecamatan
 * @property string $userDaerah
 * @property string $userKodePos
 * @property boolean $alamatStatus
 */
class MUserAlamatTambahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_user_alamat_tambahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'userAlamat', 'userKota', 'userKelurahan', 'userKecamatan', 'userDaerah', 'userKodePos'], 'required'],
            [['userId'], 'integer'],
            [['alamatStatus'], 'boolean'],
            [['userAlamat'], 'string', 'max' => 500],
            [['userKota', 'userKelurahan', 'userKecamatan', 'userDaerah'], 'string', 'max' => 100],
            [['userKodePos'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'alamatId' => 'Alamat ID',
            'userId' => 'User ID',
            'userAlamat' => 'User Alamat',
            'userKota' => 'User Kota',
            'userKelurahan' => 'User Kelurahan',
            'userKecamatan' => 'User Kecamatan',
            'userDaerah' => 'User Daerah',
            'userKodePos' => 'User Kode Pos',
            'alamatStatus' => 'Alamat Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MUserAlamatTambahanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MUserAlamatTambahanQuery(get_called_class());
    }
}
