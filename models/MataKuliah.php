<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property integer $id
 * @property string $fakultas_unit_pengajaran
 * @property string $kode_organisasi
 * @property string $program_studi
 * @property string $jenjang
 * @property string $program
 * @property string $kategori_koefisien
 * @property string $nama_mata_kuliah
 * @property string $jenis_mata_kuliah
 * @property string $kode_kelas
 * @property string $jenis_kelas
 *
 * @property Pengajar[] $pengajars
 * @property Dosen[] $nipNidnDosens
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mata_kuliah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fakultas_unit_pengajaran', 'kode_organisasi', 'program_studi', 'jenjang', 'program', 'kategori_koefisien', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kode_kelas', 'jenis_kelas'], 'required'],
            [['fakultas_unit_pengajaran', 'kategori_koefisien'], 'string'],
            [['kode_organisasi', 'program_studi', 'jenjang', 'program', 'nama_mata_kuliah', 'jenis_mata_kuliah', 'kode_kelas', 'jenis_kelas'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fakultas_unit_pengajaran' => 'Fakultas Unit Pengajaran',
            'kode_organisasi' => 'Kode Organisasi',
            'program_studi' => 'Program Studi',
            'jenjang' => 'Jenjang',
            'program' => 'Program',
            'kategori_koefisien' => 'Kategori Koefisien',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'jenis_mata_kuliah' => 'Jenis Mata Kuliah',
            'kode_kelas' => 'Kode Kelas',
            'jenis_kelas' => 'Jenis Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajars()
    {
        return $this->hasMany(Pengajar::className(), ['id_mata_kuliah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidnDosens()
    {
        return $this->hasMany(Dosen::className(), ['nip_nidn' => 'nip_nidn_dosen'])->viaTable('pengajar', ['id_mata_kuliah' => 'id']);
    }
}
