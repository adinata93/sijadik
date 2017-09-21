<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property string $nip_nidn
 * @property string $kode_mata_kuliah
 * @property string $kode_organisasi
 * @property string $nomor_sk
 * @property string $sks_ekivalen
 * @property string $beban_sks_dosen
 * @property string $fte
 * @property integer $status
 *
 * @property Dosen $nipNidn
 * @property MataKuliah $kodeMataKuliah
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
            [['nip_nidn', 'kode_mata_kuliah'], 'required'],
            [['sks_ekivalen', 'beban_sks_dosen', 'fte'], 'number'],
            [['status'], 'integer'],
            [['nip_nidn', 'kode_mata_kuliah', 'kode_organisasi', 'nomor_sk'], 'string', 'max' => 40],
            [['nip_nidn'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['nip_nidn' => 'nip_nidn']],
            [['kode_mata_kuliah'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['kode_mata_kuliah' => 'kode_mata_kuliah']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn' => 'Nip Nidn',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
            'kode_organisasi' => 'Kode Organisasi',
            'nomor_sk' => 'Nomor Sk',
            'sks_ekivalen' => 'Sks Ekivalen',
            'beban_sks_dosen' => 'Beban Sks Dosen',
            'fte' => 'Fte',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidn()
    {
        return $this->hasOne(Dosen::className(), ['nip_nidn' => 'nip_nidn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['kode_mata_kuliah' => 'kode_mata_kuliah']);
    }
}
