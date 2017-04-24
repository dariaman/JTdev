<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_slide_show".
 *
 * @property integer $slideId
 * @property string $slideUrl
 * @property string $slideStatus
 */
class MSlideShow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_slide_show';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slideUrl', 'slideStatus'], 'required'],
            [['slideUrl'], 'string', 'max' => 500],
            [['slideStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slideId' => 'Slide ID',
            'slideUrl' => 'Slide Url',
            'slideStatus' => 'Slide Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MSlideShowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MSlideShowQuery(get_called_class());
    }
}
