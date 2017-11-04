<?php

namespace app\controllers;

use Yii;
use app\models\Jadwal;
use app\models\JadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Dosen;
use app\models\MataKuliah;

/**
 * JadwalController implements the CRUD actions for Jadwal model.
 */
class JadwalController extends Controller
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
     * Lists all Jadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jadwal model.
     * @param integer $id
     * @param string $nip_nidn_dosen_pengajar
     * @param integer $id_mata_kuliah_pengajar
     * @return mixed
     */
    public function actionView($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar),
        ]);
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jadwal();

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen_pengajar])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah_pengajar])->one();
            $model->nama_mata_kuliah = $matkul->nama_mata_kuliah;
            $model->jenis_mata_kuliah = $matkul->jenis_mata_kuliah;
            $model->kategori_koefisien = $matkul->kategori_koefisien;

            $jad = Jadwal::find()
                ->where(
                    ['and',
                        ['nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar],
                        ['or',
                            ['and', ['>=', 'jadwal_start', $model->jadwal_start], ['<=', 'jadwal_end', $model->jadwal_end]],
                            ['or',
                                ['and', ['<=', 'jadwal_start', $model->jadwal_start], ['>=', 'jadwal_end', $model->jadwal_start]],
                                ['and', ['<=', 'jadwal_start', $model->jadwal_end], ['>=', 'jadwal_end', $model->jadwal_end]]
                            ]
                        ]
                    ]
                )
            ->all();

            if ($jad == null) {
                $model->save();
            } else {
                $print = "<b>GAGAL CREATE</b>";
                foreach ($jad as $key) {

                    $print = $print . "<br>Terdapat konflik jadwal dengan Mata Kuliah <i>" . $matkul->nama_mata_kuliah . "</i> pada <i>" . $key->jadwal_start . "</i> sampai dengan <i>" . $key->jadwal_end . "</i>";
                }
                
                Yii::$app->session->setFlash('danger', $print);
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Jadwal Start</i> dan <i>Jadwal End</i> yang berbeda dan tidak memiliki konflik untuk menambahkan jadwal baru');
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id, 'nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $model->id_mata_kuliah_pengajar]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $nip_nidn_dosen_pengajar
     * @param integer $id_mata_kuliah_pengajar
     * @return mixed
     */
    public function actionUpdate($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar)
    {
        $model = $this->findModel($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar);

        if ($model->load(Yii::$app->request->post())) {
            $dos = Dosen::find()->where(['nip_nidn' => $model->nip_nidn_dosen_pengajar])->one();
            $model->nama_dosen = $dos->nama_dosen;
            $model->departemen_dosen = $dos->departemen_dosen;

            $matkul = MataKuliah::find()->where(['id' => $model->id_mata_kuliah_pengajar])->one();
            $model->nama_mata_kuliah = $matkul->nama_mata_kuliah;
            $model->jenis_mata_kuliah = $matkul->jenis_mata_kuliah;
            $model->kategori_koefisien = $matkul->kategori_koefisien;
            
            $jad = Jadwal::find()
                ->where(
                    ['and',
                        ['and',
                            ['nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar],
                            ['!=', 'id', $model->id]
                        ],
                        ['or',
                            ['and', ['>=', 'jadwal_start', $model->jadwal_start], ['<=', 'jadwal_end', $model->jadwal_end]],
                            ['or',
                                ['and', ['<=', 'jadwal_start', $model->jadwal_start], ['>=', 'jadwal_end', $model->jadwal_start]],
                                ['and', ['<=', 'jadwal_start', $model->jadwal_end], ['>=', 'jadwal_end', $model->jadwal_end]]
                            ]
                        ]
                    ]
                )
            ->all();

            if ($jad == null) {
                $model->save();
            } else {
                $print = "<b>GAGAL UPDATE</b>";
                foreach ($jad as $key) {

                    $print = $print . "<br>Terdapat konflik jadwal dengan Mata Kuliah <i>" . $matkul->nama_mata_kuliah . "</i> pada <i>" . $key->jadwal_start . "</i> sampai dengan <i>" . $key->jadwal_end . "</i>";
                }
                
                Yii::$app->session->setFlash('danger', $print);
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Jadwal Start</i> dan <i>Jadwal End</i> yang berbeda dan tidak memiliki konflik untuk menambahkan jadwal baru');
                
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id, 'nip_nidn_dosen_pengajar' => $model->nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $model->id_mata_kuliah_pengajar]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $nip_nidn_dosen_pengajar
     * @param integer $id_mata_kuliah_pengajar
     * @return mixed
     */
    public function actionDelete($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar)
    {
        $this->findModel($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $nip_nidn_dosen_pengajar
     * @param integer $id_mata_kuliah_pengajar
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $nip_nidn_dosen_pengajar, $id_mata_kuliah_pengajar)
    {
        if (($model = Jadwal::findOne(['id' => $id, 'nip_nidn_dosen_pengajar' => $nip_nidn_dosen_pengajar, 'id_mata_kuliah_pengajar' => $id_mata_kuliah_pengajar])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
