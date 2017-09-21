<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WaktuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waktu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_waktu') ?>

    <?= $form->field($model, 'waktu') ?>

    <?= $form->field($model, 'kode_kelas') ?>

    <?= $form->field($model, 'kode_mata_kuliah') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
