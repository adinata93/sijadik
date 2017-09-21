<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembimbingPenguji */

$this->title = 'Update Pembimbing Penguji: ' . $model->nip_nidn;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing Pengujis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_nidn, 'url' => ['view', 'nip_nidn' => $model->nip_nidn, 'npm' => $model->npm]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembimbing-penguji-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
