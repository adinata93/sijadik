<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembimbingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembimbing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pembimbing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'striped' => false,
        'pjax' => true,
        'hover' => true,
        'showPageSummary' => true,
        'pageSummaryRowOptions' => ['class'=>'warning text-right text-danger', 'style'=>'font-weight:bold;'],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'nip_nidn_dosen',
            [
                'attribute'=>'departemen_dosen',
                'group'=>true,
                'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                    return [
                        'mergeColumns'=>[[1,4]], // columns to merge in summary
                        'content'=>[             // content to show in each summary cell
                            1=>'Summary (' . $model->departemen_dosen . ')',
                            5=>GridView::F_SUM,
                            6=>GridView::F_SUM,
                        ],
                        'contentFormats'=>[      // content reformatting for each summary cell
                            5=>['format'=>'number', 'decimals'=>3],
                            6=>['format'=>'number', 'decimals'=>3],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                            1=>['style'=>'font-variant:small-caps',],
                            5=>['style'=>'text-align:right'],
                            6=>['style'=>'text-align:right'],
                        ],
                        'options'=>['class'=>'info','style'=>'font-weight:bold;'] // html attributes for group summary row
                    ];
                },
            ],
            [
                'attribute'=>'nama_dosen',
                'subGroupOf'=>1,
                'group'=>true,
                'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                    return [
                        'mergeColumns'=>[[2,4]], // columns to merge in summary
                        'content'=>[             // content to show in each summary cell
                            2=>'Summary (' . $model->nama_dosen . ')',
                            5=>GridView::F_SUM,
                            6=>GridView::F_SUM,
                        ],
                        'contentFormats'=>[      // content reformatting for each summary cell
                            5=>['format'=>'number', 'decimals'=>3],
                            6=>['format'=>'number', 'decimals'=>3],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                            2=>['style'=>'font-variant:small-caps',],
                            5=>['style'=>'text-align:right'],
                            6=>['style'=>'text-align:right'],
                        ],
                        'options'=>['class'=>'danger','style'=>'font-weight:bold;'] // html attributes for group summary row
                    ];
                },
            ],
            'jenis_bimbingan',
            [
                'attribute'=>'jumlah_mahasiswa',
                'label'=>'Jumlah Mhs',
                'pageSummary' => 'Page Summary',
            ],
            [
                'attribute'=>'sks_kum',
                'pageSummary' => true,
            ],
            [
                'attribute'=>'bkd_fte',
                'pageSummary' => true,
            ],

            // 'last_updated_by',
            // 'last_updated_time',
            // 'tahun_ajaran',
            // 'is_locked',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
