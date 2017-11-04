<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Dosen;
use app\models\MataKuliah;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn_dosen')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dosen::find()->all(),'nip_nidn','nama_dosen'),
        'language' => 'en',
        'options' => ['placeholder' => 'Search nama dosen'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Dosen',['class'=>'label-class'])?>

    <?= $form->field($model, 'id_mata_kuliah')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(MataKuliah::find()->all(),'id','nama_mata_kuliah'),
        'language' => 'en',
        'options' => ['placeholder' => 'Search nama mata kuliah'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Mata Kuliah',['class'=>'label-class'])?>

    <?= $form->field($model, 'skenario')->textInput(['placeholder' => 'Hanya diisi jika Jenis Mata Kuliah adalah Narasumber']) ?>
    
    <?= $form->field($model, 'sks_ekivalen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_bkd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
