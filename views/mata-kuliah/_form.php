<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\MataKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-kuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fakultas_unit_pengajaran')->widget(Select2::classname(), [
        'data' => [ 'Kedokteran' => 'Kedokteran', 'Kedokteran Gigi' => 'Kedokteran Gigi', 'Matematika dan Ilmu Pengetehuan Alam' => 'Matematika dan Ilmu Pengetehuan Alam', 'Teknik' => 'Teknik', 'Hukum' => 'Hukum', 'Ekonomi' => 'Ekonomi', 'Ilmu Pengetahuan Budaya' => 'Ilmu Pengetahuan Budaya', 'Psikologi' => 'Psikologi', 'Ilmu Sosial dan Politik' => 'Ilmu Sosial dan Politik', 'Kesehatan Masyarakat' => 'Kesehatan Masyarakat', 'Program Pasca Sarjana' => 'Program Pasca Sarjana', 'Ilmu Komputer' => 'Ilmu Komputer', 'Ilmu Keperawatan' => 'Ilmu Keperawatan', 'Pusat Administrasi Universitas' => 'Pusat Administrasi Universitas', 'Program Vokasi' => 'Program Vokasi', 'Pertukaran Pelajar' => 'Pertukaran Pelajar', 'Farmasi' => 'Farmasi', 'FIA' => 'FIA', 'Ilmu Lingkungan' => 'Ilmu Lingkungan', 'Kajian Strategic dan Global' => 'Kajian Strategic dan Global', 'Program Mata Ajaran Universitas' => 'Program Mata Ajaran Universitas', 'Rumpun Ilmu Kesehatan' => 'Rumpun Ilmu Kesehatan', 'Psikologi Virtual' => 'Psikologi Virtual', ],
        'language' => 'en',
        'options' => ['placeholder' => 'Search fakultas unit pengajaran'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>
    
    <?= $form->field($model, 'kode_organisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenjang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori_koefisien')->widget(Select2::classname(), [
        'data' => [ 'Kosong' => 'Kosong', 'D3' => 'D3', 'S1 Reguler' => 'S1 Reguler', 'S1 Ekstensi / Khusus / Sejenis' => 'S1 Ekstensi / Khusus / Sejenis', 'S1 Internasional' => 'S1 Internasional', 'Profesi' => 'Profesi', 'S2 Reguler' => 'S2 Reguler', 'Spesialis' => 'Spesialis', 'S2 Khusus' => 'S2 Khusus', 'S3' => 'S3', ],
        'language' => 'en',
        'options' => ['placeholder' => 'Search kategori koefisien'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <?= $form->field($model, 'nama_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_kelas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
