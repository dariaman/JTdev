<?php

namespace app\controllers;

use Yii;
use app\models\MPromo;
use app\models\MPromoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MPromoController implements the CRUD actions for MPromo model.
 */
class MPromoController extends Controller
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
     * Lists all MPromo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MPromoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MPromo model.
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
     * Creates a new MPromo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MPromo();

        if ($model->load(Yii::$app->request->post())) {
            $model->promoGambarUrl = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString();
            
            $model->promoGambarUrl->saveAs('../gbr/'.$img . '.' . $model->promoGambarUrl->extension);
            $model->promoGambarUrl = 'images/'.$img . '.' . $model->promoGambarUrl->extension;
            $model->promoDibuatOleh = Yii::$app->user->identity->id;
            $model->promoDibuatTgl = date('Y-m-d');
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if (Yii::$app->request->isPost) {
            if (file_exists(Yii::$app->params['GambarPromo'] . $model->promoGambarUrl)){
                unlink(Yii::$app->params['GambarPromo'] . $model->promoGambarUrl);    
            }
            $model->load(Yii::$app->request->post());
            $model->promoGambarUrl = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString();
            $nama = $img . '.' . $model->promoGambarUrl->extension;
            $model->promoGambarUrl->saveAs($nama);
            $model->promoGambarUrl = 'images/'.$nama;
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MPromo model.
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
     * Finds the MPromo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MPromo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MPromo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
