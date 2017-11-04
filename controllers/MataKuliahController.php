<?php

namespace app\controllers;

use Yii;
use app\models\MataKuliah;
use app\models\MataKuliahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MataKuliahController implements the CRUD actions for MataKuliah model.
 */
class MataKuliahController extends Controller
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
     * Lists all MataKuliah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MataKuliahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MataKuliah model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MataKuliah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MataKuliah();

        if ($model->load(Yii::$app->request->post())) {

            $matkul = MataKuliah::find()
                ->where(
                    ['and',
                        ['kategori_koefisien' => $model->kategori_koefisien],
                        ['and',
                            ['nama_mata_kuliah' => $model->nama_mata_kuliah],
                            ['jenis_mata_kuliah' => $model->jenis_mata_kuliah]
                        ]
                    ]
                )
            ->all();

            if ($matkul == null) {
                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL CREATE</b> <br> Mata kuliah <i>' . $model->nama_mata_kuliah . '</i> dengan jenis <i>' . $model->jenis_mata_kuliah . '</i> dan kategori <i>' . $model->kategori_koefisien . '</i> sudah ada');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Kategori Koefisien</i>, <i>Nama Mata Kuliah</i> dan <i>Jenis Mata Kuliah</i> yang berbeda jika ingin menambahkan mata kuliah baru');
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MataKuliah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $matkul = MataKuliah::find()
                ->where(
                    ['and',
                        ['!=', 'id', $id],
                        ['and',
                            ['kategori_koefisien' => $model->kategori_koefisien],
                            ['and',
                                ['nama_mata_kuliah' => $model->nama_mata_kuliah],
                                ['jenis_mata_kuliah' => $model->jenis_mata_kuliah]
                            ]
                        ]
                    ]
                )
            ->all();

            if ($matkul == null) {
                $model->save();
            } else {
                Yii::$app->session->setFlash('danger', '<b>GAGAL UPDATE</b> <br> Mata kuliah <i>' . $model->nama_mata_kuliah . '</i> dengan jenis <i>' . $model->jenis_mata_kuliah . '</i> dan kategori <i>' . $model->kategori_koefisien . '</i> sudah ada');
                Yii::$app->session->setFlash('info', '<b>SOLUSI</b> <br> Berikan input <i>Kategori Koefisien</i>, <i>Nama Mata Kuliah</i> dan <i>Jenis Mata Kuliah</i> yang berbeda jika ingin menambahkan mata kuliah baru');
                
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MataKuliah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MataKuliah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MataKuliah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MataKuliah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
