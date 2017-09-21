<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Waktu */

$this->title = $model->id_waktu;
$this->params['breadcrumbs'][] = ['label' => 'Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waktu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_waktu' => $model->id_waktu, 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_waktu' => $model->id_waktu, 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah], [
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
            'id_waktu',
            'waktu',
            'kode_kelas',
            'kode_mata_kuliah',
        ],
    ]) ?>

</div>
