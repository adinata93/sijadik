<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form about `app\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn', 'kode_mata_kuliah', 'kode_organisasi', 'nomor_sk'], 'safe'],
            [['sks_ekivalen', 'beban_sks_dosen', 'fte'], 'number'],
            [['status'], 'integer'],
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
        $query = Jadwal::find();

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
            'sks_ekivalen' => $this->sks_ekivalen,
            'beban_sks_dosen' => $this->beban_sks_dosen,
            'fte' => $this->fte,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nip_nidn', $this->nip_nidn])
            ->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah])
            ->andFilterWhere(['like', 'kode_organisasi', $this->kode_organisasi])
            ->andFilterWhere(['like', 'nomor_sk', $this->nomor_sk]);

        return $dataProvider;
    }
}
