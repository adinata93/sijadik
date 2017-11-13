<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penguji".
 *
 * @property string $nip_nidn_dosen
 * @property string $departemen_dosen
 * @property string $nama_dosen
 * @property string $jenis_ujian
 * @property string $peran
 * @property integer $jumlah_mahasiswa
 * @property string $sks_kum
 * @property string $last_updated_by
 * @property string $last_updated_time
 * @property string $tahun_ajaran
 * @property string $is_locked
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
            [['nip_nidn_dosen', 'departemen_dosen', 'nama_dosen', 'jenis_ujian', 'peran', 'jumlah_mahasiswa', 'last_updated_by', 'last_updated_time', 'tahun_ajaran', 'is_locked'], 'required'],
            [['departemen_dosen', 'jenis_ujian', 'peran', 'is_locked'], 'string'],
            [['jumlah_mahasiswa'], 'integer'],
            [['sks_kum'], 'number'],
            [['last_updated_time'], 'safe'],
            [['nip_nidn_dosen', 'nama_dosen', 'last_updated_by', 'tahun_ajaran'], 'string', 'max' => 100],
            [['nip_nidn_dosen'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['nip_nidn_dosen' => 'nip_nidn']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn_dosen' => 'NIP/NIDN Dosen',
            'departemen_dosen' => 'Departemen Dosen',
            'nama_dosen' => 'Nama Dosen',
            'jenis_ujian' => 'Jenis Ujian',
            'peran' => 'Peran',
            'jumlah_mahasiswa' => 'Jumlah Mahasiswa',
            'sks_kum' => 'SKS KUM',
            'last_updated_by' => 'Last Updated By',
            'last_updated_time' => 'Last Updated Time',
            'tahun_ajaran' => 'Tahun Ajaran',
            'is_locked' => 'Is Locked',
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
