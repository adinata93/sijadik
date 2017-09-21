<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_organisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_ekivalen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beban_sks_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
