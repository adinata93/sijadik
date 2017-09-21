<?php

namespace app\controllers;

use Yii;
use app\models\Jadwal;
use app\models\JadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * @param string $nip_nidn
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionView($nip_nidn, $kode_mata_kuliah)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_nidn, $kode_mata_kuliah),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_nidn' => $model->nip_nidn, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_nidn
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionUpdate($nip_nidn, $kode_mata_kuliah)
    {
        $model = $this->findModel($nip_nidn, $kode_mata_kuliah);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_nidn' => $model->nip_nidn, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_nidn
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionDelete($nip_nidn, $kode_mata_kuliah)
    {
        $this->findModel($nip_nidn, $kode_mata_kuliah)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_nidn
     * @param string $kode_mata_kuliah
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_nidn, $kode_mata_kuliah)
    {
        if (($model = Jadwal::findOne(['nip_nidn' => $nip_nidn, 'kode_mata_kuliah' => $kode_mata_kuliah])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
