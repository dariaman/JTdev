<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_faq".
 *
 * @property integer $faqId
 * @property string $faqJudul
 * @property string $faqDeskripsi
 * @property string $faqStatus
 */
class MFaq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faqJudul', 'faqDeskripsi', 'faqStatus'], 'required'],
            [['faqJudul'], 'string', 'max' => 100],
            [['faqDeskripsi'], 'string', 'max' => 500],
            [['faqStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'faqId' => 'Faq ID',
            'faqJudul' => 'Faq Judul',
            'faqDeskripsi' => 'Faq Deskripsi',
            'faqStatus' => 'Faq Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MFaqQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MFaqQuery(get_called_class());
    }
}
