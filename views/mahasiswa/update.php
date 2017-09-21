<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */

$this->title = 'Update Mahasiswa: ' . $model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->npm, 'url' => ['view', 'id' => $model->npm]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
