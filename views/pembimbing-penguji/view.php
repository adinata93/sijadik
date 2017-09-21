<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PembimbingPenguji */

$this->title = $model->nip_nidn;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing Pengujis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-penguji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nip_nidn' => $model->nip_nidn, 'npm' => $model->npm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip_nidn' => $model->nip_nidn, 'npm' => $model->npm], [
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
            'npm',
            'pembimbing_penguji',
            'beban_sks_dosen',
            'fte',
        ],
    ]) ?>

</div>
