<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waktu".
 *
 * @property string $id_waktu
 * @property string $waktu
 * @property string $kode_kelas
 * @property string $kode_mata_kuliah
 *
 * @property Kelas $kodeKelas
 */
class Waktu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waktu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_waktu', 'kode_kelas', 'kode_mata_kuliah'], 'required'],
            [['waktu'], 'safe'],
            [['id_waktu', 'kode_kelas', 'kode_mata_kuliah'], 'string', 'max' => 40],
            [['kode_kelas', 'kode_mata_kuliah'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kode_kelas' => 'kode_kelas', 'kode_mata_kuliah' => 'kode_mata_kuliah']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_waktu' => 'Id Waktu',
            'waktu' => 'Waktu',
            'kode_kelas' => 'Kode Kelas',
            'kode_mata_kuliah' => 'Kode Mata Kuliah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeKelas()
    {
        return $this->hasOne(Kelas::className(), ['kode_kelas' => 'kode_kelas', 'kode_mata_kuliah' => 'kode_mata_kuliah']);
    }
}
