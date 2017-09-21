<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembimbing_penguji".
 *
 * @property string $nip_nidn
 * @property string $npm
 * @property string $pembimbing_penguji
 * @property string $beban_sks_dosen
 * @property string $fte
 *
 * @property Dosen $nipNidn
 * @property Mahasiswa $npm0
 */
class PembimbingPenguji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembimbing_penguji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip_nidn', 'npm'], 'required'],
            [['pembimbing_penguji'], 'string'],
            [['beban_sks_dosen', 'fte'], 'number'],
            [['nip_nidn', 'npm'], 'string', 'max' => 40],
            [['nip_nidn'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['nip_nidn' => 'nip_nidn']],
            [['npm'], 'exist', 'skipOnError' => true, 'targetClass' => Mahasiswa::className(), 'targetAttribute' => ['npm' => 'npm']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip_nidn' => 'Nip Nidn',
            'npm' => 'Npm',
            'pembimbing_penguji' => 'Pembimbing Penguji',
            'beban_sks_dosen' => 'Beban Sks Dosen',
            'fte' => 'Fte',
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
    public function getNpm0()
    {
        return $this->hasOne(Mahasiswa::className(), ['npm' => 'npm']);
    }
}
