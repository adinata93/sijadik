<?php

use yii\helpers\Html;
use app\models\MataKuliah;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah_pengajar])->one();

$this->title = 'Update Jadwal: ' . $matkul->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $matkul->nama_mata_kuliah, 'url' => ['view', 'id' => $model->id, 'nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $model->id_mata_kuliah_pengajar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
