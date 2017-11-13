<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departemen_dosen')->widget(Select2::classname(), [
        'data' => [ 'Ilmu Bedah Mulut' => 'Ilmu Bedah Mulut', 'Ilmu Kedokteran Gigi Anak' => 'Ilmu Kedokteran Gigi Anak', 'Ilmu Kesehatan Gigi Masyarakat Pencegahan' => 'Ilmu Kesehatan Gigi Masyarakat Pencegahan', 'Ilmu Koservasi Gigi' => 'Ilmu Koservasi Gigi', 'Ilmu Material Kedokteran Gigi' => 'Ilmu Material Kedokteran Gigi', 'Ilmu Penyakit Mulut' => 'Ilmu Penyakit Mulut', 'Oral Biologi' => 'Oral Biologi', 'Ortodonsia' => 'Ortodonsia', 'Periodonsia' => 'Periodonsia', 'Prostodonsia' => 'Prostodonsia', 'Radiologi Kedokteran Gigi' => 'Radiologi Kedokteran Gigi', ],
        'options' => ['placeholder' => 'Search departemen dosen'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'tahun_ajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_locked')->widget(Select2::classname(), [
        'data' => [ 'Unlocked' => 'Unlocked', 'Locked' => 'Locked', ],
        'hideSearch' => true,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
