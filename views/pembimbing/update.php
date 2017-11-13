<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */

$this->title = 'Update Pembimbing: ' . $model->nama_dosen;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_dosen, 'url' => ['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_bimbingan' => $model->jenis_bimbingan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembimbing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
