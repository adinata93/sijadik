<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property string $nip_nidn
 * @property string $nama_dosen
 * @property string $departemen_dosen
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
            [['nip_nidn', 'nama_dosen', 'departemen_dosen'], 'required'],
            [['departemen_dosen'], 'string'],
            [['nip_nidn', 'nama_dosen'], 'string', 'max' => 100],
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
            'departemen_dosen' => 'Departemen Dosen',
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
