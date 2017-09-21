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
            [['kode_mata_kuliah', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'program_studi', 'jenjang', 'program_kelas'], 'safe'],
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
        $query->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'jenis_mata_kuliah', $this->jenis_mata_kuliah])
            ->andFilterWhere(['like', 'program_studi', $this->program_studi])
            ->andFilterWhere(['like', 'jenjang', $this->jenjang])
            ->andFilterWhere(['like', 'program_kelas', $this->program_kelas]);

        return $dataProvider;
    }
}
