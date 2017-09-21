<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jadwal */

$this->title = 'Update Jadwal: ' . $model->nip_nidn;
$this->params['breadcrumbs'][] = ['label' => 'Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_nidn, 'url' => ['view', 'nip_nidn' => $model->nip_nidn, 'kode_mata_kuliah' => $model->kode_mata_kuliah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
