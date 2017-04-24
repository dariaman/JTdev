<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_tips".
 *
 * @property integer $tipsId
 * @property string $tipsJudul
 * @property string $tipsDeskripsi
 * @property string $tipsDibuatTgl
 * @property string $tipsDibuatOleh
 * @property string $tipsStatus
 */
class MTips extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_tips';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipsId', 'tipsJudul', 'tipsDeskripsi', 'tipsDibuatOleh', 'tipsStatus'], 'required'],
            [['tipsId'], 'integer'],
            [['tipsDeskripsi'], 'string'],
            [['tipsDibuatTgl'], 'safe'],
            [['tipsJudul', 'tipsDibuatOleh'], 'string', 'max' => 100],
            [['tipsStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipsId' => 'Tips ID',
            'tipsJudul' => 'Tips Judul',
            'tipsDeskripsi' => 'Tips Deskripsi',
            'tipsDibuatTgl' => 'Tips Dibuat Tgl',
            'tipsDibuatOleh' => 'Tips Dibuat Oleh',
            'tipsStatus' => 'Tips Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MTipsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MTipsQuery(get_called_class());
    }
}
