<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property string $kode_kelas
 * @property string $nama_kelas
 * @property string $jenis_kelas
 * @property integer $skenario
 * @property string $kode_mata_kuliah
 *
 * @property MataKuliah $kodeMataKuliah
 * @property Waktu[] $waktus
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kelas', 'kode_mata_kuliah'], 'required'],
            [['skenario'], 'integer'],
            [['kode_kelas', 'jenis_kelas', 'kode_mata_kuliah'], 'string', 'max' => 40],
            [['nama_kelas'], 'string', 'max' => 100],
            [['kode_mata_kuliah'], 'exist', 'skipOnError' => true, 'targetClass' => MataKuliah::className(), 'targetAttribute' => ['kode_mata_kuliah' => 'kode_mata_kuliah']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kelas' => 'Kode Kelas',
            'nama_kelas' => 'Nama Kelas',
            'jenis_kelas' => 'Jenis Kelas',
            'skenario' => 'Skenario',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['kode_mata_kuliah' => 'kode_mata_kuliah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaktus()
    {
        return $this->hasMany(Waktu::className(), ['kode_kelas' => 'kode_kelas', 'kode_mata_kuliah' => 'kode_mata_kuliah']);
    }
}
