<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property integer $id
 * @property string $nip_nidn_dosen_pengajar
 * @property string $nama_dosen
 * @property string $departemen_dosen
 * @property integer $id_mata_kuliah_pengajar
 * @property string $nama_mata_kuliah
 * @property string $jenis_mata_kuliah
 * @property string $kategori_koefisien
 * @property string $jadwal_start
 * @property string $jadwal_end
 *
 * @property Pengajar $nipNidnDosenPengajar
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen_pengajar', 'nama_dosen', 'departemen_dosen', 'id_mata_kuliah_pengajar', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kategori_koefisien', 'jadwal_start', 'jadwal_end'], 'required'],
            [['departemen_dosen', 'kategori_koefisien'], 'string'],
            [['id_mata_kuliah_pengajar'], 'integer'],
            [['jadwal_start', 'jadwal_end'], 'safe'],
            [['nip_nidn_dosen_pengajar', 'nama_dosen', 'nama_mata_kuliah', 'jenis_mata_kuliah'], 'string', 'max' => 100],
            [['nip_nidn_dosen_pengajar', 'id_mata_kuliah_pengajar'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajar::className(), 'targetAttribute' => ['nip_nidn_dosen_pengajar' => 'nip_nidn_dosen', 'id_mata_kuliah_pengajar' => 'id_mata_kuliah']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip_nidn_dosen_pengajar' => 'Nip Nidn Dosen Pengajar',
            'nama_dosen' => 'Nama Dosen',
            'departemen_dosen' => 'Departemen Dosen',
            'id_mata_kuliah_pengajar' => 'Id Mata Kuliah Pengajar',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'jenis_mata_kuliah' => 'Jenis Mata Kuliah',
            'kategori_koefisien' => 'Kategori Koefisien',
            'jadwal_start' => 'Jadwal Start',
            'jadwal_end' => 'Jadwal End',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidnDosenPengajar()
    {
        return $this->hasOne(Pengajar::className(), ['nip_nidn_dosen' => 'nip_nidn_dosen_pengajar', 'id_mata_kuliah' => 'id_mata_kuliah_pengajar']);
    }
}
