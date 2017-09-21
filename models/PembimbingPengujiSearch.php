<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PembimbingPenguji;

/**
 * PembimbingPengujiSearch represents the model behind the search form about `app\models\PembimbingPenguji`.
 */
class PembimbingPengujiSearch extends PembimbingPenguji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn', 'npm', 'pembimbing_penguji'], 'safe'],
            [['beban_sks_dosen', 'fte'], 'number'],
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
        $query = PembimbingPenguji::find();

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
            'beban_sks_dosen' => $this->beban_sks_dosen,
            'fte' => $this->fte,
        ]);

        $query->andFilterWhere(['like', 'nip_nidn', $this->nip_nidn])
            ->andFilterWhere(['like', 'npm', $this->npm])
            ->andFilterWhere(['like', 'pembimbing_penguji', $this->pembimbing_penguji]);

        return $dataProvider;
    }
}
