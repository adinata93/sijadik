<?php

namespace app\controllers;

use Yii;
use app\models\Pembimbing;
use app\models\PembimbingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dosen;
use yii\filters\AccessControl;

/**
 * PembimbingController implements the CRUD actions for Pembimbing model.
 */
class PembimbingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'login',
                        ],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'index',
                            'view',
                            'create',
                            'update',
                            'delete',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function(){
                            return (
                                Yii::$app->user->identity->role=='Super Admin'
                            );
                        }
                    ],
                    [
                        'actions' => [
                            'index',
                            'view',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function(){
                            return (
                                Yii::$app->user->identity->role!='Super Admin'
                            );
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pembimbing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembimbingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembimbing model.
     * @param string $nip_nidn_dosen
     * @param string $jenis_bimbingan
     * @return mixed
     */
    public function actionView($nip_nidn_dosen, $jenis_bimbingan)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_nidn_dosen, $jenis_bimbingan),
        ]);
    }

    /**
     * Creates a new Pembimbing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pembimbing();

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;
            $model->last_updated_by = Yii::$app->user->identity->nama;
            $model->last_updated_time = date('Y-m-d H:i:s');
            // $model->tahun_ajaran = 'Ganjil 2016/2017'; // TEMPORARY CODE
            // $model->is_locked = 'Unlocked'; // TEMPORARY CODE

            if ($model->sks_kum == null) {
                $model->sks_kum = 0;
            }

            if ($model->jenis_bimbingan == 'Skripsi') {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.2; 
            } else if ($model->jenis_bimbingan == 'Disertasi') {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.5;
            } else {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.35; 
            }

            $pem = Pembimbing::find()
                ->where(
                    ['and',
                        ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                        ['jenis_bimbingan' => $model->jenis_bimbingan]
                    ]
                )
            ->one();

            // Send calculation to Dosen Page
            $dos->total_sks_kum = $dos->total_sks_kum + $model->sks_kum;
            $dos->total_bkd_fte = $dos->total_bkd_fte + $model->bkd_fte;

            if ($pem == null) {
                $model->save();
                $dos->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL CREATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah memiliki jenis bimbingan <i>' . $pem->jenis_bimbingan . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Lakukan update <i>Jumlah Mahasiswa</i> pada data dengan filter <i>Nama Dosen: ' . $dos->nama_dosen . '</i>dan <i>Jenis Bimbingan: ' . $pem->jenis_bimbingan . '</i>');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_bimbingan' => $model->jenis_bimbingan]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pembimbing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_nidn_dosen
     * @param string $jenis_bimbingan
     * @return mixed
     */
    public function actionUpdate($nip_nidn_dosen, $jenis_bimbingan)
    {
        $model = $this->findModel($nip_nidn_dosen, $jenis_bimbingan);

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;
            $model->last_updated_by = Yii::$app->user->identity->nama;
            $model->last_updated_time = date('Y-m-d H:i:s');

            if ($model->sks_kum == null) {
                $model->sks_kum = 0;
            }

            if ($model->jenis_bimbingan == 'Skripsi') {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.2; 
            } else if ($model->jenis_bimbingan == 'Disertasi') {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.5;
            } else {
                $model->bkd_fte = $model->jumlah_mahasiswa * 0.35; 
            }
            
            $pem = Pembimbing::find()
                ->where(
                    ['and',
                        ['or',
                            ['!=', 'nip_nidn_dosen', $nip_nidn_dosen],
                            ['!=', 'jenis_bimbingan', $jenis_bimbingan]
                        ],
                        ['and',
                            ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                            ['jenis_bimbingan' => $model->jenis_bimbingan]
                        ]
                    ]
                )
            ->one();

            // Send calculation to Dosen Page
            $temp = Pembimbing::find()
                ->where(
                    ['and',
                        ['nip_nidn_dosen' => $nip_nidn_dosen],
                        ['jenis_bimbingan' => $jenis_bimbingan]
                    ]
                )
            ->one();
            $dos->total_sks_kum = $dos->total_sks_kum + $model->sks_kum - $temp->sks_kum;
            $dos->total_bkd_fte = $dos->total_bkd_fte + $model->bkd_fte - $temp->bkd_fte;

            if ($pem == null) {
                $model->save();
                $dos->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL UPDATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah memiliki jenis bimbingan <i>' . $pem->jenis_bimbingan . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Lakukan update <i>Jumlah Mahasiswa</i> pada data dengan filter <i>Nama Dosen: ' . $dos->nama_dosen . '</i>dan <i>Jenis Bimbingan: ' . $pem->jenis_bimbingan . '</i>');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_bimbingan' => $model->jenis_bimbingan]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pembimbing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_nidn_dosen
     * @param string $jenis_bimbingan
     * @return mixed
     */
    public function actionDelete($nip_nidn_dosen, $jenis_bimbingan)
    {
        $model = $this->findModel($nip_nidn_dosen, $jenis_bimbingan);
            // Send calculation to Dosen Page
            $dos = Dosen::find()->where(['nip_nidn' => $nip_nidn_dosen])->one(); 
            $dos->total_sks_kum = $dos->total_sks_kum - $model->sks_kum;
            $dos->total_bkd_fte = $dos->total_bkd_fte - $model->bkd_fte;
            $dos->save();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembimbing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_nidn_dosen
     * @param string $jenis_bimbingan
     * @return Pembimbing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_nidn_dosen, $jenis_bimbingan)
    {
        if (($model = Pembimbing::findOne(['nip_nidn_dosen' => $nip_nidn_dosen, 'jenis_bimbingan' => $jenis_bimbingan])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
