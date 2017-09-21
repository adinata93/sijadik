<?php

namespace app\controllers;

use Yii;
use app\models\Waktu;
use app\models\WaktuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WaktuController implements the CRUD actions for Waktu model.
 */
class WaktuController extends Controller
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
     * Lists all Waktu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WaktuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Waktu model.
     * @param string $id_waktu
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionView($id_waktu, $kode_kelas, $kode_mata_kuliah)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_waktu, $kode_kelas, $kode_mata_kuliah),
        ]);
    }

    /**
     * Creates a new Waktu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Waktu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_waktu' => $model->id_waktu, 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Waktu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_waktu
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionUpdate($id_waktu, $kode_kelas, $kode_mata_kuliah)
    {
        $model = $this->findModel($id_waktu, $kode_kelas, $kode_mata_kuliah);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_waktu' => $model->id_waktu, 'kode_kelas' => $model->kode_kelas, 'kode_mata_kuliah' => $model->kode_mata_kuliah]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Waktu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_waktu
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return mixed
     */
    public function actionDelete($id_waktu, $kode_kelas, $kode_mata_kuliah)
    {
        $this->findModel($id_waktu, $kode_kelas, $kode_mata_kuliah)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Waktu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_waktu
     * @param string $kode_kelas
     * @param string $kode_mata_kuliah
     * @return Waktu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_waktu, $kode_kelas, $kode_mata_kuliah)
    {
        if (($model = Waktu::findOne(['id_waktu' => $id_waktu, 'kode_kelas' => $kode_kelas, 'kode_mata_kuliah' => $kode_mata_kuliah])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
