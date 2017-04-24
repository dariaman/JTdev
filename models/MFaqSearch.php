<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MFaq;

/**
 * MFaqSearch represents the model behind the search form about `app\models\MFaq`.
 */
class MFaqSearch extends MFaq
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faqId'], 'integer'],
            [['faqJudul', 'faqDeskripsi', 'faqStatus'], 'safe'],
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
        $query = MFaq::find();

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
            'faqId' => $this->faqId,
        ]);

        $query->andFilterWhere(['like', 'faqJudul', $this->faqJudul])
            ->andFilterWhere(['like', 'faqDeskripsi', $this->faqDeskripsi])
            ->andFilterWhere(['like', 'faqStatus', $this->faqStatus]);

        return $dataProvider;
    }
}
