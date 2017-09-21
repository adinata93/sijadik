<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembimbingPenguji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-penguji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pembimbing_penguji')->dropDownList([ 'pembimbing' => 'Pembimbing', 'penguji' => 'Penguji', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'beban_sks_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
