<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MOfficeHour;

/**
 * MOfficeHourSearch represents the model behind the search form about `app\models\MOfficeHour`.
 */
class MOfficeHourSearch extends MOfficeHour
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['officeHourId', 'officeHourValue'], 'integer'],
            [['officeHourTitle', 'officeHourStatus'], 'safe'],
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
        $query = MOfficeHour::find();

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
            'officeHourId' => $this->officeHourId,
            'officeHourValue' => $this->officeHourValue,
        ]);

        $query->andFilterWhere(['like', 'officeHourTitle', $this->officeHourTitle])
            ->andFilterWhere(['like', 'officeHourStatus', $this->officeHourStatus]);

        return $dataProvider;
    }
}
