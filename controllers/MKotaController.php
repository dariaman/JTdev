<?php

namespace app\controllers;

use Yii;
use app\models\MKota;
use app\models\MKotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MKotaController implements the CRUD actions for MKota model.
 */
class MKotaController extends Controller
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
     * Lists all MKota models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MKotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MKota model.
     * @param integer $id
     * @return mixed
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new MKota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MKota();

        if (Yii::$app->request->IsPost){
            $model->load(Yii::$app->request->post());
            $model->save(false);
            // $execsp = Yii::$app->db->createCommand("CALL KotaInsert(:nama, :ongkos)");
            // $execsp->bindValue(':nama', $model->kotaNama);
            // $execsp->bindValue(':ongkos', $model->Ongkir);
            // $execsp->execute();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing MKota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
            $model->save(false);

            $execsp = Yii::$app->db->createCommand("CALL OngkirKotaUpdate(:idkota)");
            $execsp->bindValue(':idkota', $id);
            $execsp->execute();
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing MKota model.
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
     * Finds the MKota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MKota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MKota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
