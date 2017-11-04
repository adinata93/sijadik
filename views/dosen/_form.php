<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departemen_dosen')->dropDownList([ 'Oral Biologi' => 'Oral Biologi', 'Ilmu Bedah Mulut' => 'Ilmu Bedah Mulut', 'Ilmu Koservasi Gigi' => 'Ilmu Koservasi Gigi', 'Ilmu Kedokteran Gigi Anak' => 'Ilmu Kedokteran Gigi Anak', 'Ilmu Penyakit Mulut' => 'Ilmu Penyakit Mulut', 'Ilmu Kesehatan Gigi Masyarakat Pencegahan' => 'Ilmu Kesehatan Gigi Masyarakat Pencegahan', 'Ilmu Material Kedokteran Gigi' => 'Ilmu Material Kedokteran Gigi', 'Radiologi Kedokteran Gigi' => 'Radiologi Kedokteran Gigi', 'Ortodonsia' => 'Ortodonsia', 'Periodonsia' => 'Periodonsia', 'Prostodonsia' => 'Prostodonsia', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
