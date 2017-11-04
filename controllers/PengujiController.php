<?php

namespace app\controllers;

use Yii;
use app\models\Penguji;
use app\models\PengujiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dosen;

/**
 * PengujiController implements the CRUD actions for Penguji model.
 */
class PengujiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Penguji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengujiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penguji model.
     * @param string $nip_nidn_dosen
     * @param string $jenis_ujian
     * @param string $peran
     * @return mixed
     */
    public function actionView($nip_nidn_dosen, $jenis_ujian, $peran)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_nidn_dosen, $jenis_ujian, $peran),
        ]);
    }

    /**
     * Creates a new Penguji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penguji();

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $pem = Penguji::find()
                ->where(
                    ['and',
                        ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                        ['and',
                            ['jenis_ujian' => $model->jenis_ujian],
                            ['peran' => $model->peran]
                        ]
                    ]
                )
            ->one();

            if ($pem == null) {

                // SET VALIDAI JENIS UJIAN DAN PERAN DISINI
                    # code ...

                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL CREATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah memiliki jenis ujian <i>' . $pem->jenis_ujian . '</i> dengan peran <i>' . $pem->peran . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Lakukan update <i>Jumlah Mahasiswa</i> pada data dengan filter <i>Nama Dosen: ' . $dos->nama_dosen . '</i>, <i>Jenis Ujian: ' . $pem->jenis_ujian . '</i>, dan <i> Peran: ' . $pem->peran . '</i>');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_ujian' => $model->jenis_ujian, 'peran' => $model->peran]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Penguji model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_nidn_dosen
     * @param string $jenis_ujian
     * @param string $peran
     * @return mixed
     */
    public function actionUpdate($nip_nidn_dosen, $jenis_ujian, $peran)
    {
        $model = $this->findModel($nip_nidn_dosen, $jenis_ujian, $peran);

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $pem = Penguji::find()
                ->where(
                    ['and',
                        ['or',
                            ['!=', 'nip_nidn_dosen', $nip_nidn_dosen],
                            ['or',
                                ['!=', 'jenis_ujian', $jenis_ujian],
                                ['!=', 'peran', $peran]
                            ]
                        ],
                        ['and',
                            ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                            ['and',
                                ['jenis_ujian' => $model->jenis_ujian],
                                ['peran' => $model->peran]
                            ]
                        ]
                    ]
                )
            ->one();

            if ($pem == null) {

                // SET VALIDAI JENIS UJIAN DAN PERAN DISINI
                    # code ...

                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL UPDATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah memiliki jenis ujian <i>' . $pem->jenis_ujian . '</i> dengan peran <i>' . $pem->peran . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Lakukan update <i>Jumlah Mahasiswa</i> pada data dengan filter <i>Nama Dosen: ' . $dos->nama_dosen . '</i>, <i>Jenis Ujian: ' . $pem->jenis_ujian . '</i>, dan <i> Peran: ' . $pem->peran . '</i>');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'jenis_ujian' => $model->jenis_ujian, 'peran' => $model->peran]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Penguji model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_nidn_dosen
     * @param string $jenis_ujian
     * @param string $peran
     * @return mixed
     */
    public function actionDelete($nip_nidn_dosen, $jenis_ujian, $peran)
    {
        $this->findModel($nip_nidn_dosen, $jenis_ujian, $peran)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penguji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_nidn_dosen
     * @param string $jenis_ujian
     * @param string $peran
     * @return Penguji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_nidn_dosen, $jenis_ujian, $peran)
    {
        if (($model = Penguji::findOne(['nip_nidn_dosen' => $nip_nidn_dosen, 'jenis_ujian' => $jenis_ujian, 'peran' => $peran])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
