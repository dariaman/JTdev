<?php

namespace app\controllers;

use Yii;
use app\models\MKelurahan;
use app\models\MKecamatan;
use app\models\MKelurahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * MKelurahanController implements the CRUD actions for MKelurahan model.
 */
class MKelurahanController extends Controller
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
     * Lists all MKelurahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MKelurahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MKelurahan model.
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
     * Creates a new MKelurahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MKelurahan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->kelurahanId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing MKelurahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelKec = MKecamatan::findOne($model->kecamatanId);
        $model->kotaId = $modelKec->kotaId;
        // $model->kecamatanId = $modelKec->kecamatanId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->kelurahanId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing MKelurahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    public function actionListKec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kota_id = $parents[0];
                $model = \app\models\MKecamatan::find()->where(['kotaId'=>$parents[0]])->all();
                foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value->kecamatanId,'name'=> $value->kecamatanNama];
                }
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    /**
     * Finds the MKelurahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MKelurahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MKelurahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
