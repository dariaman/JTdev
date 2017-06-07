<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_service".
 *
 * @property integer $serviceId
 * @property string $serviceJudul
 * @property string $serviceStatus
 */
class MService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serviceJudul', 'serviceStatus'], 'required'],
            [['serviceJudul'], 'string', 'max' => 100],
            [['serviceStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serviceId' => 'Service ID',
            'serviceJudul' => 'Service Judul',
            'serviceStatus' => 'Service Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MServiceQuery(get_called_class());
    }
}
