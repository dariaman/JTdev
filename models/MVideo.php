<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_video".
 *
 * @property integer $videoId
 * @property string $videoUrl
 * @property string $videoStatus
 */
class MVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['videoUrl', 'videoStatus'], 'required'],
            [['videoUrl'], 'string', 'max' => 500],
            [['videoStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'videoId' => 'Video ID',
            'videoUrl' => 'Video Url',
            'videoStatus' => 'Video Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MVideoQuery(get_called_class());
    }
}
