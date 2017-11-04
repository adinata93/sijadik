<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Dosen;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */

$dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();

$this->title = $dos->nama_dosen;
$this->params['breadcrumbs'][] = ['label' => 'Penguji', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penguji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_ujian' => $model->jenis_ujian, 'peran' => $model->peran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_ujian' => $model->jenis_ujian, 'peran' => $model->peran], [
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
            'jenis_ujian',
            'peran',
            'jumlah_mahasiswa',
            'sks_bkd',
        ],
    ]) ?>

</div>
