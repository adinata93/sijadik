<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pengajar', ['create'], ['class' => 'btn btn-success']) ?>
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
            // [
            //     'attribute'=>'id_mata_kuliah',
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
                'attribute'=>'skenario',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'sks_ekivalen',
                'pageSummary' => true,
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'sks_bkd',
                'pageSummary' => true,
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'fte',
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
