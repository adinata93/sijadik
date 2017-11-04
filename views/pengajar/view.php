<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MataKuliah;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah])->one();

$this->title = $matkul->nama_mata_kuliah;
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'id_mata_kuliah' => $model->id_mata_kuliah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'id_mata_kuliah' => $model->id_mata_kuliah], [
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
            // 'nip_nidn_dosen',
            'nama_dosen',
            'departemen_dosen',
            // 'id_mata_kuliah',
            'nama_mata_kuliah',
            'jenis_mata_kuliah',
            'kategori_koefisien',
            'skenario',
            'sks_ekivalen',
            'sks_bkd',
            'fte',
        ],
    ]) ?>

</div>
