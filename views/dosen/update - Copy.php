<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dosen */

$this->title = 'Update Dosen: ' . $model->nip_nidn;
$this->params['breadcrumbs'][] = ['label' => 'Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_nidn, 'url' => ['view', 'id' => $model->nip_nidn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
