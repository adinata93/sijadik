<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penguji".
 *
 * @property string $nip_nidn_dosen
 * @property string $nama_dosen
 * @property string $departemen_dosen
 * @property string $jenis_ujian
 * @property string $peran
 * @property integer $jumlah_mahasiswa
 * @property string $sks_bkd
 *
 * @property Dosen $nipNidnDosen
 */
class Penguji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penguji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen', 'nama_dosen', 'departemen_dosen', 'jenis_ujian', 'peran', 'jumlah_mahasiswa'], 'required'],
            [['departemen_dosen', 'jenis_ujian', 'peran'], 'string'],
            [['jumlah_mahasiswa'], 'integer'],
            [['sks_bkd'], 'number'],
            [['nip_nidn_dosen', 'nama_dosen'], 'string', 'max' => 100],
            [['nip_nidn_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['nip_nidn_dosen' => 'nip_nidn']],
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
            'jenis_ujian' => 'Jenis Ujian',
            'peran' => 'Peran',
            'jumlah_mahasiswa' => 'Jumlah Mahasiswa',
            'sks_bkd' => 'SKS BKD',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidnDosen()
    {
        return $this->hasOne(Dosen::className(), ['nip_nidn' => 'nip_nidn_dosen']);
    }
}
