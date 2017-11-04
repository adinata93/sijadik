<?php

use yii\helpers\Html;
use app\models\Dosen;

/* @var $this yii\web\View */
/* @var $model app\models\Pembimbing */

$dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();

$this->title = 'Update Pembimbing: ' . $dos->nama_dosen;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $dos->nama_dosen, 'url' => ['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_bimbingan' => $model->jenis_bimbingan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembimbing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
