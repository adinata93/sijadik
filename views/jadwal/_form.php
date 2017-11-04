<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Dosen;
use app\models\MataKuliah;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip_nidn_dosen_pengajar')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dosen::find()->all(),'nip_nidn','nama_dosen'),
        'language' => 'en',
        'options' => ['placeholder' => 'Search nama dosen'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Dosen',['class'=>'label-class'])?>

    <?= $form->field($model, 'id_mata_kuliah_pengajar')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(MataKuliah::find()->all(),'id','nama_mata_kuliah'),
        'language' => 'en',
        'options' => ['placeholder' => 'Search nama mata kuliah'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama Mata Kuliah',['class'=>'label-class'])?>
    
    <?= $form->field($model, 'jadwal_start')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Tentukan tanggal, jam, dan menit'],
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd h:i:00',
            'autoclose'=>true,
        ],
    ]) ?>

    <?= $form->field($model, 'jadwal_end')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Tentukan tanggal, jam, dan menit'],
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd h:i:00',
            'autoclose'=>true,
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
