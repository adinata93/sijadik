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

    <?= $form->field($model, 'nip_nidn') ?>

    <?= $form->field($model, 'kode_mata_kuliah') ?>

    <?= $form->field($model, 'kode_organisasi') ?>

    <?= $form->field($model, 'nomor_sk') ?>

    <?= $form->field($model, 'sks_ekivalen') ?>

    <?php // echo $form->field($model, 'beban_sks_dosen') ?>

    <?php // echo $form->field($model, 'fte') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
