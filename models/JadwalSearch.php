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
            [['id', 'id_mata_kuliah_pengajar'], 'integer'],
            [['nip_nidn_dosen_pengajar', 'nama_dosen', 'departemen_dosen', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kategori_koefisien', 'jadwal_start', 'jadwal_end'], 'safe'],
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
            'id' => $this->id,
            'id_mata_kuliah_pengajar' => $this->id_mata_kuliah_pengajar,
            'jadwal_start' => $this->jadwal_start,
            'jadwal_end' => $this->jadwal_end,
        ]);

        $query->andFilterWhere(['like', 'nip_nidn_dosen_pengajar', $this->nip_nidn_dosen_pengajar])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'departemen_dosen', $this->departemen_dosen])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'jenis_mata_kuliah', $this->jenis_mata_kuliah])
            ->andFilterWhere(['like', 'kategori_koefisien', $this->kategori_koefisien]);

        return $dataProvider;
    }
}
