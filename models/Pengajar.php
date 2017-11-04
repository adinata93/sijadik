<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengajar".
 *
 * @property string $nip_nidn_dosen
 * @property string $nama_dosen
 * @property string $departemen_dosen
 * @property integer $id_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $jenis_mata_kuliah
 * @property string $kategori_koefisien
 * @property integer $skenario
 * @property string $sks_ekivalen
 * @property string $sks_bkd
 * @property string $fte
 *
 * @property Jadwal[] $jadwals
 * @property Dosen $nipNidnDosen
 * @property MataKuliah $idMataKuliah
 */
class Pengajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen', 'nama_dosen', 'departemen_dosen', 'id_mata_kuliah', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kategori_koefisien'], 'required'],
            [['departemen_dosen', 'kategori_koefisien'], 'string'],
            [['id_mata_kuliah', 'skenario'], 'integer'],
            [['sks_ekivalen', 'sks_bkd', 'fte'], 'number'],
            [['nip_nidn_dosen', 'nama_dosen', 'nama_mata_kuliah', 'jenis_mata_kuliah'], 'string', 'max' => 100],
            [['nip_nidn_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['nip_nidn_dosen' => 'nip_nidn']],
            [['id_mata_kuliah'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['id_mata_kuliah' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn_dosen' => 'Nip Nidn Dosen',
            'nama_dosen' => 'Nama Dosen',
            'departemen_dosen' => 'Departemen Dosen',
            'id_mata_kuliah' => 'Id Mata Kuliah',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'jenis_mata_kuliah' => 'Jenis Mata Kuliah',
            'kategori_koefisien' => 'Kategori Koefisien',
            'skenario' => 'Skenario',
            'sks_ekivalen' => 'SKS Ekivalen',
            'sks_bkd' => 'SKS BKD',
            'fte' => 'FTE',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['nip_nidn_dosen_pengajar' => 'nip_nidn_dosen', 'id_mata_kuliah_pengajar' => 'id_mata_kuliah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidnDosen()
    {
        return $this->hasOne(Dosen::className(), ['nip_nidn' => 'nip_nidn_dosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['id' => 'id_mata_kuliah']);
    }
}
