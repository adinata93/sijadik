<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = $model->kode_kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah], [
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
            'kode_kelas',
            'nama_kelas',
            'jenis_kelas',
            'skenario',
            'kode_mata_kuliah',
        ],
    ]) ?>

</div>
