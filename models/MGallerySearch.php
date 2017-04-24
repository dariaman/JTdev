<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MGallery;

/**
 * MGallerySearch represents the model behind the search form about `app\models\MGallery`.
 */
class MGallerySearch extends MGallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['galleriId'], 'integer'],
            [['galleriJudul', 'galleriDeskripsi', 'galleriTgl', 'galleriGambarUrl', 'galleriDibuatTgl', 'galleriDibuatOleh', 'galleriStatus'], 'safe'],
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
        $query = MGallery::find();

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
            'galleriId' => $this->galleriId,
            'galleriTgl' => $this->galleriTgl,
            'galleriDibuatTgl' => $this->galleriDibuatTgl,
        ]);

        $query->andFilterWhere(['like', 'galleriJudul', $this->galleriJudul])
            ->andFilterWhere(['like', 'galleriDeskripsi', $this->galleriDeskripsi])
            ->andFilterWhere(['like', 'galleriGambarUrl', $this->galleriGambarUrl])
            ->andFilterWhere(['like', 'galleriDibuatOleh', $this->galleriDibuatOleh])
            ->andFilterWhere(['like', 'galleriStatus', $this->galleriStatus]);

        return $dataProvider;
    }
}
