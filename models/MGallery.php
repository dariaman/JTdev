<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_gallery".
 *
 * @property integer $galleriId
 * @property string $galleriJudul
 * @property string $galleriDeskripsi
 * @property string $galleriTgl
 * @property string $galleriGambarUrl
 * @property string $galleriDibuatTgl
 * @property string $galleriDibuatOleh
 * @property string $galleriStatus
 */
class MGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_gallery';
    }

    /**
     * @inheritdoc
     */
    public $pic;
    public function rules()
    {
        return [
            [['galleriJudul', 'galleriDeskripsi', 'galleriTgl', 'galleriDibuatOleh', 'galleriStatus'], 'required'],
            [['galleriId'], 'integer'],
            [['galleriDeskripsi'], 'string'],
            [['galleriTgl', 'galleriDibuatTgl'], 'safe'],
            [['galleriJudul'], 'string', 'max' => 100],
            [['galleriDibuatOleh'], 'string', 'max' => 200],
            [['galleriStatus'], 'string', 'max' => 1],
            [['galleriGambarUrl'], 'safe'],
            [['pic'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'galleriId' => 'Galleri ID',
            'galleriJudul' => 'Galleri Judul',
            'galleriDeskripsi' => 'Galleri Deskripsi',
            'galleriTgl' => 'Galleri Tgl',
            'galleriGambarUrl' => 'Galleri Gambar Url',
            'galleriDibuatTgl' => 'Galleri Dibuat Tgl',
            'galleriDibuatOleh' => 'Galleri Dibuat Oleh',
            'galleriStatus' => 'Galleri Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MGalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MGalleryQuery(get_called_class());
    }
}
