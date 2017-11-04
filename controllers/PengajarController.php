<?php

namespace app\controllers;

use Yii;
use app\models\Pengajar;
use app\models\PengajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dosen;
use app\models\MataKuliah;

/**
 * PengajarController implements the CRUD actions for Pengajar model.
 */
class PengajarController extends Controller
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
     * Lists all Pengajar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajar model.
     * @param string $nip_nidn_dosen
     * @param integer $id_mata_kuliah
     * @return mixed
     */
    public function actionView($nip_nidn_dosen, $id_mata_kuliah)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_nidn_dosen, $id_mata_kuliah),
        ]);
    }

    /**
     * Creates a new Pengajar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengajar();

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah])->one();
            $model->nama_mata_kuliah = $matkul->nama_mata_kuliah;
            $model->jenis_mata_kuliah = $matkul->jenis_mata_kuliah;
            $model->kategori_koefisien = $matkul->kategori_koefisien;

            // skenario validation
                # code...

            $jad = Pengajar::find()
                ->where(
                    ['and',
                        ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                        ['id_mata_kuliah' => $model->id_mata_kuliah]
                    ]
                )
            ->all();

            if ($jad == null) {
                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL CREATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah menjadi pengajar pada mata kuliah <i>' . $matkul->nama_mata_kuliah . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Nama Dosen</i> dan <i>Nama Mata Kuliah</i> yang berbeda jika ingin menambahkan pengajar baru pada suatu mata kuliah');
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'id_mata_kuliah' => $model->id_mata_kuliah]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pengajar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_nidn_dosen
     * @param integer $id_mata_kuliah
     * @return mixed
     */
    public function actionUpdate($nip_nidn_dosen, $id_mata_kuliah)
    {
        $model = $this->findModel($nip_nidn_dosen, $id_mata_kuliah);

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah])->one();
            $model->nama_mata_kuliah = $matkul->nama_mata_kuliah;
            $model->jenis_mata_kuliah = $matkul->jenis_mata_kuliah;
            $model->kategori_koefisien = $matkul->kategori_koefisien;

            $jad = Pengajar::find()
                ->where(
                    ['and',
                        ['or',
                            ['!=', 'nip_nidn_dosen', $nip_nidn_dosen],
                            ['!=', 'id_mata_kuliah', $id_mata_kuliah]
                        ],
                        ['and',
                            ['nip_nidn_dosen' => $model->nip_nidn_dosen],
                            ['id_mata_kuliah' => $model->id_mata_kuliah]
                        ]
                    ]
                )
            ->all();

            if ($jad == null) {
                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL UPDATE</b> <br> <i>' . $dos->nama_dosen . '</i> sudah menjadi pengajar pada mata kuliah <i>' . $matkul->nama_mata_kuliah . '</i>');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Nama Dosen</i> dan <i>Nama Mata Kuliah</i> yang berbeda jika ingin menambahkan pengajar baru pada suatu mata kuliah');
                
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'nip_nidn_dosen' => $model->nip_nidn_dosen, 'id_mata_kuliah' => $model->id_mata_kuliah]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pengajar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_nidn_dosen
     * @param integer $id_mata_kuliah
     * @return mixed
     */
    public function actionDelete($nip_nidn_dosen, $id_mata_kuliah)
    {
        $this->findModel($nip_nidn_dosen, $id_mata_kuliah)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_nidn_dosen
     * @param integer $id_mata_kuliah
     * @return Pengajar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_nidn_dosen, $id_mata_kuliah)
    {
        if (($model = Pengajar::findOne(['nip_nidn_dosen' => $nip_nidn_dosen, 'id_mata_kuliah' => $id_mata_kuliah])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
