<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembimbingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nip_nidn_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'departemen_dosen') ?>

    <?= $form->field($model, 'jenis_bimbingan') ?>

    <?= $form->field($model, 'jumlah_mahasiswa') ?>

    <?php // echo $form->field($model, 'sks_bkd') ?>

    <?php // echo $form->field($model, 'fte') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
