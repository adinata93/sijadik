<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dosen', ['create'], ['class' => 'btn btn-success']) ?>
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

            [
                'attribute'=>'departemen_dosen',
                'group'=>true,
                'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                    return [
                        'mergeColumns'=>[[1,3]], // columns to merge in summary
                        'content'=>[             // content to show in each summary cell
                            1=>'Summary (' . $model->departemen_dosen . ')',
                            4=>GridView::F_SUM,
                            5=>GridView::F_SUM,
                        ],
                        'contentFormats'=>[      // content reformatting for each summary cell
                            4=>['format'=>'number', 'decimals'=>3],
                            5=>['format'=>'number', 'decimals'=>3],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                            1=>['style'=>'font-variant:small-caps',],
                            4=>['style'=>'text-align:right'],
                            5=>['style'=>'text-align:right'],
                        ],
                        'options'=>['class'=>'info','style'=>'font-weight:bold;'] // html attributes for group summary row
                    ];
                },
            ],
            'nama_dosen',
            [
                'attribute'=>'nip_nidn',
                'pageSummary' => 'Page Summary',
                // 'visible'=>function ($model, $key, $index, $column) {
                //     if (Yii::$app->user->identity->role=='Super Admin') {
                //         return true;
                //     } else {
                //         return false;
                //     }
                // }
            ],
            [
                'attribute'=>'total_sks_kum',
                'pageSummary' => true,
            ],
            [
                'attribute'=>'total_bkd_fte',
                'pageSummary' => true,
            ],
            // 'tahun_ajaran',
            // 'is_locked',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
