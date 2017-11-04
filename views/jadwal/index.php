<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // [
            //     'attribute'=>'id',
            //     'vAlign'=>'middle',
            // ],
            // [
            //     'attribute'=>'nip_nidn_dosen_pengajar',
            //     'vAlign'=>'middle',
            // ],
            [
                'attribute'=>'nama_dosen',
                'label'=>'Nama Dosen',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'departemen_dosen',
                'label'=>'Dept. Dosen',
                'vAlign'=>'middle',
            ],
            // [
            //     'attribute'=>'id_mata_kuliah_pengajar',
            //     'vAlign'=>'middle',
            // ],
            [
                'attribute'=>'nama_mata_kuliah',
                'label'=>'Nama MK',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jenis_mata_kuliah',
                'label'=>'Jenis MK',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'kategori_koefisien',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jadwal_start',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jadwal_end',
                'vAlign'=>'middle',
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'hover' => true,
    ]); ?>
</div>
