<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_events".
 *
 * @property integer $eventId
 * @property string $eventJudul
 * @property string $eventDeskripsi
 * @property string $eventTgl
 * @property string $eventGambarUrl
 * @property string $eventDibuatTgl
 * @property string $eventDibuatOleh
 * @property string $eventStatus
 */
class MEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventId', 'eventJudul', 'eventDeskripsi', 'eventTgl', 'eventDibuatOleh', 'eventStatus'], 'required'],
            [['eventId'], 'integer'],
            [['eventDeskripsi'], 'string'],
            [['eventTgl', 'eventDibuatTgl'], 'safe'],
            [['eventJudul'], 'string', 'max' => 100],
            [['eventGambarUrl', 'eventDibuatOleh'], 'string', 'max' => 200],
            [['eventStatus'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventId' => 'Event ID',
            'eventJudul' => 'Event Judul',
            'eventDeskripsi' => 'Event Deskripsi',
            'eventTgl' => 'Event Tgl',
            'eventGambarUrl' => 'Event Gambar Url',
            'eventDibuatTgl' => 'Event Dibuat Tgl',
            'eventDibuatOleh' => 'Event Dibuat Oleh',
            'eventStatus' => 'Event Status',
        ];
    }

    /**
     * @inheritdoc
     * @return MEventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MEventsQuery(get_called_class());
    }
}
