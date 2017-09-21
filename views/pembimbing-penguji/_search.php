<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembimbingPengujiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-penguji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nip_nidn') ?>

    <?= $form->field($model, 'npm') ?>

    <?= $form->field($model, 'pembimbing_penguji') ?>

    <?= $form->field($model, 'beban_sks_dosen') ?>

    <?= $form->field($model, 'fte') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
