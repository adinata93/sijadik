<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property string $nip_nidn
 * @property string $nama_dosen
 * @property string $departemen
 *
 * @property Jadwal[] $jadwals
 * @property MataKuliah[] $kodeMataKuliahs
 * @property PembimbingPenguji[] $pembimbingPengujis
 * @property Mahasiswa[] $npms
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn'], 'required'],
            [['departemen'], 'string'],
            [['nip_nidn'], 'string', 'max' => 40],
            [['nama_dosen'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn' => 'Nip Nidn',
            'nama_dosen' => 'Nama Dosen',
            'departemen' => 'Departemen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['nip_nidn' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeMataKuliahs()
    {
        return $this->hasMany(MataKuliah::className(), ['kode_mata_kuliah' => 'kode_mata_kuliah'])->viaTable('jadwal', ['nip_nidn' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbingPengujis()
    {
        return $this->hasMany(PembimbingPenguji::className(), ['nip_nidn' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNpms()
    {
        return $this->hasMany(Mahasiswa::className(), ['npm' => 'npm'])->viaTable('pembimbing_penguji', ['nip_nidn' => 'nip_nidn']);
    }
}
