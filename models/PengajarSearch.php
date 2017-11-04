<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajar;

/**
 * PengajarSearch represents the model behind the search form about `app\models\Pengajar`.
 */
class PengajarSearch extends Pengajar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen', 'nama_dosen', 'departemen_dosen', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kategori_koefisien'], 'safe'],
            [['id_mata_kuliah', 'skenario'], 'integer'],
            [['sks_ekivalen', 'sks_bkd', 'fte'], 'number'],
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
        $query = Pengajar::find();

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
            'id_mata_kuliah' => $this->id_mata_kuliah,
            'skenario' => $this->skenario,
            'sks_ekivalen' => $this->sks_ekivalen,
            'sks_bkd' => $this->sks_bkd,
            'fte' => $this->fte,
        ]);

        $query->andFilterWhere(['like', 'nip_nidn_dosen', $this->nip_nidn_dosen])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'departemen_dosen', $this->departemen_dosen])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'jenis_mata_kuliah', $this->jenis_mata_kuliah])
            ->andFilterWhere(['like', 'kategori_koefisien', $this->kategori_koefisien]);

        return $dataProvider;
    }
}
