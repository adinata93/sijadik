<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengujiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penguji';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penguji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penguji', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // [
            //     'attribute'=>'nip_nidn_dosen',
            //     'vAlign'=>'middle',
            // ],
            [
                'attribute'=>'nama_dosen',
                'label'=>'Nama Dosen',
                'pageSummary' => 'Total',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'departemen_dosen',
                'label'=>'Dept. Dosen',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jenis_ujian',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'peran',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jumlah_mahasiswa',
                'label'=>'Jumlah Mhs',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'sks_bkd',
                'pageSummary' => true,
                'vAlign'=>'middle',
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'hover' => true,
        'showPageSummary' => true,
    ]); ?>
</div>
