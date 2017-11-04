<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MataKuliah */

$this->title = $model->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'fakultas_unit_pengajaran',
            'kode_organisasi',
            'program_studi',
            'jenjang',
            'program',
            'kategori_koefisien',
            'nama_mata_kuliah',
            'jenis_mata_kuliah',
            'kode_kelas',
            'jenis_kelas',
        ],
    ]) ?>

</div>
