<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Dosen;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Penguji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penguji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn_dosen')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dosen::find()->all(),'nip_nidn','nama_dosen'),
        'language' => 'en',
        'options' => ['placeholder' => 'Search nama dosen'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Dosen',['class'=>'label-class'])?>

    <?= $form->field($model, 'jenis_ujian')->widget(Select2::classname(), [
        'data' => [ 'S1 - Ujian Karya Ilmiah' => 'S1 - Ujian Karya Ilmiah', 'Profesi - Ujian UDG' => 'Profesi - Ujian UDG', 'Profesi - Ujian Komprehensif' => 'Profesi - Ujian Komprehensif', 'Spesialis - Ujian Laporan Penelitian' => 'Spesialis - Ujian Laporan Penelitian', 'Spesialis - Ujian Komprehensif' => 'Spesialis - Ujian Komprehensif', 'S2 - Ujian Proposal Penelitian' => 'S2 - Ujian Proposal Penelitian', 'S2 - Ujian Tesis' => 'S2 - Ujian Tesis', 'S3 - Ujian Proposal' => 'S3 - Ujian Proposal', 'S3 - Ujian Seminar Hasil' => 'S3 - Ujian Seminar Hasil', 'S3 - Ujian Pra Promosi' => 'S3 - Ujian Pra Promosi', 'S3 - Ujian Promosi' => 'S3 - Ujian Promosi', ],
        'language' => 'en',
        'options' => ['placeholder' => 'Search jenis ujian'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <?= $form->field($model, 'peran')->widget(Select2::classname(), [
        'data' => [ 'Ketua Penguji' => 'Ketua Penguji', 'Anggota Penguji' => 'Anggota Penguji', 'Pembimbing 1' => 'Pembimbing 1', 'Pembimbing 2' => 'Pembimbing 2', 'Pembimbing Akademik' => 'Pembimbing Akademik', 'Promotor' => 'Promotor', 'Ko-Promotor' => 'Ko-Promotor', ],
        'language' => 'en',
        'options' => ['placeholder' => 'Search peran'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <?= $form->field($model, 'jumlah_mahasiswa')->textInput() ?>

    <?= $form->field($model, 'sks_bkd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
