<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departemen')->dropDownList([ 'oral biologi' => 'Oral biologi', 'ilmu bedah mulut' => 'Ilmu bedah mulut', 'ilmu koservasi gigi' => 'Ilmu koservasi gigi', 'ilmu kedokteran gigi anak' => 'Ilmu kedokteran gigi anak', 'ilmu penyakit anak' => 'Ilmu penyakit anak', 'ilmu kesehatan gigi masyarakat pencegahan' => 'Ilmu kesehatan gigi masyarakat pencegahan', 'ilmu material kedokteran gigi' => 'Ilmu material kedokteran gigi', 'radiologi kedokteran gigi' => 'Radiologi kedokteran gigi', 'ortodonsia' => 'Ortodonsia', 'prostodonsia' => 'Prostodonsia', 'peridonsia' => 'Peridonsia', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
