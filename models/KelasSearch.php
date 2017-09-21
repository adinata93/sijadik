<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kelas;

/**
 * KelasSearch represents the model behind the search form about `app\models\Kelas`.
 */
class KelasSearch extends Kelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kelas', 'nama_kelas', 'jenis_kelas', 'kode_mata_kuliah'], 'safe'],
            [['skenario'], 'integer'],
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
        $query = Kelas::find();

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
            'skenario' => $this->skenario,
        ]);

        $query->andFilterWhere(['like', 'kode_kelas', $this->kode_kelas])
            ->andFilterWhere(['like', 'nama_kelas', $this->nama_kelas])
            ->andFilterWhere(['like', 'jenis_kelas', $this->jenis_kelas])
            ->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah]);

        return $dataProvider;
    }
}
