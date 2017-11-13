<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Dosen;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn_dosen')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dosen::find()->all(),'nip_nidn','nama_dosen'),
        'options' => ['placeholder' => 'Search nama dosen'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Dosen',['class'=>'label-class'])?>

    <?= $form->field($model, 'jenis_bimbingan')->widget(Select2::classname(), [
        'data' => [ 'Skripsi' => 'Skripsi', 'Tesis' => 'Tesis', 'Disertasi' => 'Disertasi', ],
        'options' => ['placeholder' => 'Search jenis bimbingan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <?= $form->field($model, 'jumlah_mahasiswa')->textInput() ?>

    <?= $form->field($model, 'sks_kum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_ajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_locked')->widget(Select2::classname(), [
        'data' => [ 'Unlocked' => 'Unlocked', 'Locked' => 'Locked', ],
        'hideSearch' => true,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
