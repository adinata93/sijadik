<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Waktu */

$this->title = 'Update Waktu: ' . $model->id_waktu;
$this->params['breadcrumbs'][] = ['label' => 'Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_waktu, 'url' => ['view', 'id_waktu' => $model->id_waktu, 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="waktu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
