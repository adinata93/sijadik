<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$this->title = $model->nip_nidn;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nip_nidn' => $model->nip_nidn, 'kode_mata_kuliah' => $model->kode_mata_kuliah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip_nidn' => $model->nip_nidn, 'kode_mata_kuliah' => $model->kode_mata_kuliah], [
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
            'nip_nidn',
            'kode_mata_kuliah',
            'kode_organisasi',
            'nomor_sk',
            'sks_ekivalen',
            'beban_sks_dosen',
            'fte',
            'status',
        ],
    ]) ?>

</div>
