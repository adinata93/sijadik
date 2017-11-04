<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembimbing".
 *
 * @property string $nip_nidn_dosen
 * @property string $nama_dosen
 * @property string $departemen_dosen
 * @property string $jenis_bimbingan
 * @property integer $jumlah_mahasiswa
 * @property string $sks_bkd
 * @property string $fte
 *
 * @property Dosen $nipNidnDosen
 */
class Pembimbing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembimbing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn_dosen', 'nama_dosen', 'departemen_dosen', 'jenis_bimbingan', 'jumlah_mahasiswa'], 'required'],
            [['departemen_dosen', 'jenis_bimbingan'], 'string'],
            [['jumlah_mahasiswa'], 'integer'],
            [['sks_bkd', 'fte'], 'number'],
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
            'jenis_bimbingan' => 'Jenis Bimbingan',
            'jumlah_mahasiswa' => 'Jumlah Mahasiswa',
            'sks_bkd' => 'SKS BKD',
            'fte' => 'FTE',
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
