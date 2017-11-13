<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pembimbing;

/**
 * PembimbingSearch represents the model behind the search form about `app\models\Pembimbing`.
 */
class PembimbingSearch extends Pembimbing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen', 'departemen_dosen', 'nama_dosen', 'jenis_bimbingan', 'last_updated_by', 'last_updated_time', 'tahun_ajaran', 'is_locked'], 'safe'],
            [['jumlah_mahasiswa'], 'integer'],
            [['sks_kum', 'bkd_fte'], 'number'],
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
        $query = Pembimbing::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => [
                    'departemen_dosen'=>SORT_ASC,
                    'nama_dosen'=>SORT_ASC
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'jumlah_mahasiswa' => $this->jumlah_mahasiswa,
            'sks_kum' => $this->sks_kum,
            'bkd_fte' => $this->bkd_fte,
            'last_updated_time' => $this->last_updated_time,
        ]);

        $query->andFilterWhere(['like', 'nip_nidn_dosen', $this->nip_nidn_dosen])
            ->andFilterWhere(['like', 'departemen_dosen', $this->departemen_dosen])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'jenis_bimbingan', $this->jenis_bimbingan])
            ->andFilterWhere(['like', 'last_updated_by', $this->last_updated_by])
            ->andFilterWhere(['like', 'tahun_ajaran', $this->tahun_ajaran])
            ->andFilterWhere(['like', 'is_locked', $this->is_locked]);

        return $dataProvider;
    }
}
