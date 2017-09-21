<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PembimbingPenguji */

$this->title = 'Create Pembimbing Penguji';
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing Pengujis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-penguji-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
