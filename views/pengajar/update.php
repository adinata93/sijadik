<?php

use yii\helpers\Html;
use app\models\MataKuliah;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah])->one();

$this->title = 'Update Pengajar: ' . $matkul->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $matkul->nama_mata_kuliah, 'url' => ['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'id_mata_kuliah' => $model->id_mata_kuliah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengajar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
