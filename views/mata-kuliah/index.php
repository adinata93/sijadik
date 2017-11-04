<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MataKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mata Kuliah', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'fakultas_unit_pengajaran',
                'label'=>'Fak. Unit Pengajaran',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'kode_organisasi',
                'label'=>'Kode Org.',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'program_studi',
                'vAlign'=>'middle',                
            ],
            // [
            //     'attribute'=>'jenjang',
            //     'vAlign'=>'middle',                
            // ],
            // [
            //     'attribute'=>'program',
            //     'vAlign'=>'middle',                
            // ],
            [
                'attribute'=>'kategori_koefisien',
                'vAlign'=>'middle',
            ],
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
                'attribute'=>'kode_kelas',
                'vAlign'=>'middle',
            ],
            [
                'attribute'=>'jenis_kelas',
                'vAlign'=>'middle',
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'hover' => true,
    ]); ?>
</div>
