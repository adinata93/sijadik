<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MataKuliah;

/**
 * MataKuliahSearch represents the model behind the search form about `app\models\MataKuliah`.
 */
class MataKuliahSearch extends MataKuliah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fakultas_unit_pengajaran', 'kode_organisasi', 'program_studi', 'jenjang', 'program', 'kategori_koefisien', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kode_kelas', 'jenis_kelas'], 'safe'],
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
        $query = MataKuliah::find();

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
        ]);

        $query->andFilterWhere(['like', 'fakultas_unit_pengajaran', $this->fakultas_unit_pengajaran])
            ->andFilterWhere(['like', 'kode_organisasi', $this->kode_organisasi])
            ->andFilterWhere(['like', 'program_studi', $this->program_studi])
            ->andFilterWhere(['like', 'jenjang', $this->jenjang])
            ->andFilterWhere(['like', 'program', $this->program])
            ->andFilterWhere(['like', 'kategori_koefisien', $this->kategori_koefisien])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'jenis_mata_kuliah', $this->jenis_mata_kuliah])
            ->andFilterWhere(['like', 'kode_kelas', $this->kode_kelas])
            ->andFilterWhere(['like', 'jenis_kelas', $this->jenis_kelas]);

        return $dataProvider;
    }
}
