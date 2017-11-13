<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'nip')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($model, 'nama') ?>
    
                <?= $form->field($model, 'jabatan')->dropDownList([
                    'Manajer Pendidikan' => 'Manajer Pendidikan',
                    'Manajer Umum' => 'Manajer Umum',
                    'Ketua Program Studi Pendidikan Ilmu Kedokteran Gigi' => 'Ketua Program Studi Pendidikan Ilmu Kedokteran Gigi',
                    'Ketua Program Studi Pendidikan Magister Ilmu Kedokteran Gigi Dasar' => 'Ketua Program Studi Pendidikan Magister Ilmu Kedokteran Gigi Dasar',
                    'Ketua Program Studi Pendidikan Magister Ilmu Kedokteran Gigi Komunitas' => 'Ketua Program Studi Pendidikan Magister Ilmu Kedokteran Gigi Komunitas',
                    'Ketua Program Studi Pendidikan Profesi' => 'Ketua Program Studi Pendidikan Profesi',
                    'Ketua Program Studi Pendidikan S-1' => 'Ketua Program Studi Pendidikan S-1',
                    'Ketua Program Studi Pendidikan Spesialis Bedah Mulut' => 'Ketua Program Studi Pendidikan Spesialis Bedah Mulut',
                    'Ketua Program Studi Pendidikan Spesialis Ilmu Konservasi Gigi' => 'Ketua Program Studi Pendidikan Spesialis Ilmu Konservasi Gigi',
                    'Ketua Program Studi Pendidikan Spesialis Ilmu Penyakit Mulut' => 'Ketua Program Studi Pendidikan Spesialis Ilmu Penyakit Mulut',
                    'Ketua Program Studi Pendidikan Spesialis Kedokteran Gigi Anak' => 'Ketua Program Studi Pendidikan Spesialis Kedokteran Gigi Anak',
                    'Ketua Program Studi Pendidikan Spesialis Ortodonsia' => 'Ketua Program Studi Pendidikan Spesialis Ortodonsia',
                    'Ketua Program Studi Pendidikan Spesialis Periodonsia' => 'Ketua Program Studi Pendidikan Spesialis Periodonsia',
                    'Ketua Program Studi Pendidikan Spesialis Prostodonsia' => 'Ketua Program Studi Pendidikan Spesialis Prostodonsia',
                    'Tenaga Kependidikan SDM' => 'Tenaga Kependidikan SDM', 
                    ], ['prompt' => '']) ?>

                <?= $form->field($model, 'role')->dropDownList([ 
                    'Super Admin' => 'Super Admin',
                    'KPS Pendidikan Ilmu Kedokteran Gigi' => 'KPS Pendidikan Ilmu Kedokteran Gigi',
                    'KPS Pendidikan Magister Ilmu Kedokteran Gigi Dasar' => 'KPS Pendidikan Magister Ilmu Kedokteran Gigi Dasar',
                    'KPS Pendidikan Magister Ilmu Kedokteran Gigi Komunitas' => 'KPS Pendidikan Magister Ilmu Kedokteran Gigi Komunitas',
                    'KPS Pendidikan Profesi' => 'KPS Pendidikan Profesi',
                    'KPS Pendidikan S-1' => 'KPS Pendidikan S-1',
                    'KPS Pendidikan Spesialis Bedah Mulut' => 'KPS Pendidikan Spesialis Bedah Mulut',
                    'KPS Pendidikan Spesialis Ilmu Konservasi Gigi' => 'KPS Pendidikan Spesialis Ilmu Konservasi Gigi',
                    'KPS Pendidikan Spesialis Ilmu Penyakit Mulut' => 'KPS Pendidikan Spesialis Ilmu Penyakit Mulut',
                    'KPS Pendidikan Spesialis Kedokteran Gigi Anak' => 'KPS Pendidikan Spesialis Kedokteran Gigi Anak',
                    'KPS Pendidikan Spesialis Ortodonsia' => 'KPS Pendidikan Spesialis Ortodonsia',
                    'KPS Pendidikan Spesialis Periodonsia' => 'KPS Pendidikan Spesialis Periodonsia',
                    'KPS Pendidikan Spesialis Prostodonsia' => 'KPS Pendidikan Spesialis Prostodonsia' 
                    ], ['prompt' => '']) ?>                
            
                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
