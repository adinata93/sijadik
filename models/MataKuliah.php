<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $jenis_mata_kuliah
 * @property string $program_studi
 * @property string $jenjang
 * @property string $program_kelas
 *
 * @property Jadwal[] $jadwals
 * @property Dosen[] $nipNidns
 * @property Kelas[] $kelas
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
            [['kode_mata_kuliah'], 'required'],
            [['kode_mata_kuliah', 'jenis_mata_kuliah', 'program_studi', 'jenjang', 'program_kelas'], 'string', 'max' => 40],
            [['nama_mata_kuliah'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
            'nama_mata_kuliah' => 'Nama Mata Kuliah',
            'jenis_mata_kuliah' => 'Jenis Mata Kuliah',
            'program_studi' => 'Program Studi',
            'jenjang' => 'Jenjang',
            'program_kelas' => 'Program Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['kode_mata_kuliah' => 'kode_mata_kuliah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidns()
    {
        return $this->hasMany(Dosen::className(), ['nip_nidn' => 'nip_nidn'])->viaTable('jadwal', ['kode_mata_kuliah' => 'kode_mata_kuliah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasMany(Kelas::className(), ['kode_mata_kuliah' => 'kode_mata_kuliah']);
    }
}
