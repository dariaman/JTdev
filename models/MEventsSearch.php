<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MEvents;

/**
 * MEventsSearch represents the model behind the search form about `app\models\MEvents`.
 */
class MEventsSearch extends MEvents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eventId'], 'integer'],
            [['eventJudul', 'eventDeskripsi', 'eventTgl', 'eventGambarUrl', 'eventDibuatTgl', 'eventDibuatOleh', 'eventStatus'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MEvents::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'eventId' => $this->eventId,
            'eventTgl' => $this->eventTgl,
            'eventDibuatTgl' => $this->eventDibuatTgl,
        ]);

        $query->andFilterWhere(['like', 'eventJudul', $this->eventJudul])
            ->andFilterWhere(['like', 'eventDeskripsi', $this->eventDeskripsi])
            ->andFilterWhere(['like', 'eventGambarUrl', $this->eventGambarUrl])
            ->andFilterWhere(['like', 'eventDibuatOleh', $this->eventDibuatOleh])
            ->andFilterWhere(['like', 'eventStatus', $this->eventStatus]);

        return $dataProvider;
    }
}
