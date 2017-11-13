<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengujiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penguji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nip_nidn_dosen') ?>

    <?= $form->field($model, 'departemen_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'jenis_ujian') ?>

    <?= $form->field($model, 'peran') ?>

    <?php // echo $form->field($model, 'jumlah_mahasiswa') ?>

    <?php // echo $form->field($model, 'sks_kum') ?>

    <?php // echo $form->field($model, 'last_updated_by') ?>

    <?php // echo $form->field($model, 'last_updated_time') ?>

    <?php // echo $form->field($model, 'tahun_ajaran') ?>

    <?php // echo $form->field($model, 'is_locked') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
