<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nip_nidn') ?>

    <?= $form->field($model, 'departemen_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'total_sks_kum') ?>

    <?= $form->field($model, 'total_bkd_fte') ?>

    <?php // echo $form->field($model, 'tahun_ajaran') ?>

    <?php // echo $form->field($model, 'is_locked') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
