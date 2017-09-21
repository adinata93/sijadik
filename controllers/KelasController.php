<?php

namespace app\controllers;

use Yii;
use app\models\Kelas;
use app\models\KelasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KelasController implements the CRUD actions for Kelas model.
 */
class KelasController extends Controller
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
     * Lists all Kelas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KelasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kelas model.
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionView($kode_kelas, $kode_mata_kuliah)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_kelas, $kode_mata_kuliah),
        ]);
    }

    /**
     * Creates a new Kelas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kelas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kelas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionUpdate($kode_kelas, $kode_mata_kuliah)
    {
        $model = $this->findModel($kode_kelas, $kode_mata_kuliah);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kelas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionDelete($kode_kelas, $kode_mata_kuliah)
    {
        $this->findModel($kode_kelas, $kode_mata_kuliah)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kelas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return Kelas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_kelas, $kode_mata_kuliah)
    {
        if (($model = Kelas::findOne(['kode_kelas' => $kode_kelas, 'kode_mata_kuliah' => $kode_mata_kuliah])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
