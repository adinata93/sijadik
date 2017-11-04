<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MataKuliah;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah_pengajar])->one();

$this->title = $matkul->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $model->id_mata_kuliah_pengajar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $model->id_mata_kuliah_pengajar], [
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
            // 'nip_nidn_dosen_pengajar',
            'nama_dosen',
            'departemen_dosen',
            // 'id_mata_kuliah_pengajar',
            'nama_mata_kuliah',
            'jenis_mata_kuliah',
            'kategori_koefisien',
            'jadwal_start',
            'jadwal_end',
        ],
    ]) ?>

</div>
