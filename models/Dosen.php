<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property string $nip_nidn
 * @property string $departemen_dosen
 * @property string $nama_dosen
 * @property string $total_sks_kum
 * @property string $total_bkd_fte
 * @property string $tahun_ajaran
 * @property string $is_locked
 *
 * @property Pembimbing[] $pembimbings
 * @property Pengajar[] $pengajars
 * @property MataKuliah[] $idMataKuliahs
 * @property Penguji[] $pengujis
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
            [['nip_nidn', 'departemen_dosen', 'nama_dosen', 'tahun_ajaran', 'is_locked'], 'required'],
            [['departemen_dosen', 'is_locked'], 'string'],
            [['total_sks_kum', 'total_bkd_fte'], 'number'],
            [['nip_nidn', 'nama_dosen', 'tahun_ajaran'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn' => 'NIP/NIDN',
            'departemen_dosen' => 'Departemen Dosen',
            'nama_dosen' => 'Nama Dosen',
            'total_sks_kum' => 'Total SKS KUM',
            'total_bkd_fte' => 'Total BKD/FTE',
            'tahun_ajaran' => 'Tahun Ajaran',
            'is_locked' => 'Is Locked',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbings()
    {
        return $this->hasMany(Pembimbing::className(), ['nip_nidn_dosen' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajars()
    {
        return $this->hasMany(Pengajar::className(), ['nip_nidn_dosen' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMataKuliahs()
    {
        return $this->hasMany(MataKuliah::className(), ['id' => 'id_mata_kuliah'])->viaTable('pengajar', ['nip_nidn_dosen' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengujis()
    {
        return $this->hasMany(Penguji::className(), ['nip_nidn_dosen' => 'nip_nidn']);
    }
}
