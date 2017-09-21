<?php

namespace app\controllers;

use Yii;
use app\models\PembimbingPenguji;
use app\models\PembimbingPengujiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembimbingPengujiController implements the CRUD actions for PembimbingPenguji model.
 */
class PembimbingPengujiController extends Controller
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
     * Lists all PembimbingPenguji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembimbingPengujiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembimbingPenguji model.
     * @param string $nip_nidn
     * @param string $npm
     * @return mixed
     */
    public function actionView($nip_nidn, $npm)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_nidn, $npm),
        ]);
    }

    /**
     * Creates a new PembimbingPenguji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PembimbingPenguji();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_nidn' => $model->nip_nidn, 'npm' => $model->npm]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PembimbingPenguji model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_nidn
     * @param string $npm
     * @return mixed
     */
    public function actionUpdate($nip_nidn, $npm)
    {
        $model = $this->findModel($nip_nidn, $npm);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_nidn' => $model->nip_nidn, 'npm' => $model->npm]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PembimbingPenguji model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_nidn
     * @param string $npm
     * @return mixed
     */
    public function actionDelete($nip_nidn, $npm)
    {
        $this->findModel($nip_nidn, $npm)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PembimbingPenguji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_nidn
     * @param string $npm
     * @return PembimbingPenguji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_nidn, $npm)
    {
        if (($model = PembimbingPenguji::findOne(['nip_nidn' => $nip_nidn, 'npm' => $npm])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
