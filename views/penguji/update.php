<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penguji */

$this->title = 'Update Penguji: ' . $model->nama_dosen;
$this->params['breadcrumbs'][] = ['label' => 'Penguji', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_dosen, 'url' => ['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_ujian' => $model->jenis_ujian, 'peran' => $model->peran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penguji-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
