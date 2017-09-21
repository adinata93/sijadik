<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $npm
 * @property string $nama_mahasiswa
 *
 * @property PembimbingPenguji[] $pembimbingPengujis
 * @property Dosen[] $nipNidns
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['npm'], 'required'],
            [['npm'], 'string', 'max' => 40],
            [['nama_mahasiswa'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'npm' => 'Npm',
            'nama_mahasiswa' => 'Nama Mahasiswa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembimbingPengujis()
    {
        return $this->hasMany(PembimbingPenguji::className(), ['npm' => 'npm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNipNidns()
    {
        return $this->hasMany(Dosen::className(), ['nip_nidn' => 'nip_nidn'])->viaTable('pembimbing_penguji', ['npm' => 'npm']);
    }
}
