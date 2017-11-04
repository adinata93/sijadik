<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JadwalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nip_nidn_dosen_pengajar') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'departemen_dosen') ?>

    <?= $form->field($model, 'id_mata_kuliah_pengajar') ?>

    <?php // echo $form->field($model, 'nama_mata_kuliah') ?>

    <?php // echo $form->field($model, 'jenis_mata_kuliah') ?>

    <?php // echo $form->field($model, 'kategori_koefisien') ?>

    <?php // echo $form->field($model, 'jadwal_start') ?>

    <?php // echo $form->field($model, 'jadwal_end') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
