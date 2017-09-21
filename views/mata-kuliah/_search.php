<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MataKuliahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-kuliah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_mata_kuliah') ?>

    <?= $form->field($model, 'nama_mata_kuliah') ?>

    <?= $form->field($model, 'jenis_mata_kuliah') ?>

    <?= $form->field($model, 'program_studi') ?>

    <?= $form->field($model, 'jenjang') ?>

    <?php // echo $form->field($model, 'program_kelas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
