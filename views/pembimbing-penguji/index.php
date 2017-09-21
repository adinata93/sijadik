<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembimbingPengujiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembimbing Penguji';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-penguji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pembimbing Penguji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip_nidn',
            'npm',
            'pembimbing_penguji',
            'beban_sks_dosen',
            'fte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
