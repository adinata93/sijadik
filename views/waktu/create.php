<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Waktu */

$this->title = 'Create Waktu';
$this->params['breadcrumbs'][] = ['label' => 'Waktus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waktu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
