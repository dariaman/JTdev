<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_office_hour".
 *
 * @property integer $officeHourId
 * @property integer $officeHourValue
 * @property string $officeHourTitle
 * @property string $officeHourStatus
 */
class MOfficeHour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_office_hour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['officeHourValue', 'officeHourTitle', 'officeHourStatus'], 'required'],
            [['officeHourValue'], 'integer'],
            [['officeHourTitle'], 'string', 'max' => 100],
            [['officeHourStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'officeHourId' => 'Office Hour ID',
            'officeHourValue' => 'Office Hour Value',
            'officeHourTitle' => 'Office Hour Title',
            'officeHourStatus' => 'Office Hour Status',
        ];
    }
}
