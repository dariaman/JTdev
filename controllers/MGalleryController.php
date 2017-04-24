<?php

namespace app\controllers;

use Yii;
use app\models\MGallery;
use app\models\MGallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MGalleryController implements the CRUD actions for MGallery model.
 */
class MGalleryController extends Controller
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
     * Lists all MGallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MGallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MGallery model.
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
     * Creates a new MGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MGallery();

        if ($model->load(Yii::$app->request->post())) {
            $model->galleriGambarUrl = UploadedFile::getInstance($model, 'galleriGambarUrl');
            $img = Yii::$app->security->generateRandomString();
            $model->galleriGambarUrl->saveAs(Yii::$app->params['uploadGalery'] . $img . '.' . $model->galleriGambarUrl->extension);
            $model->galleriGambarUrl-> $img . '.' . $model->galleriGambarUrl->extension;
            echo var_dump($model);
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->pic = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString();
//            echo var_dump(Yii::$app->request->post());
//            die();
//            if ($model->file = MGallery::getInstance($model,'galleriGambarUrl')) {
                $model->pic->saveAs( Yii::getAlias('@webroot') . '../../gbr/'.$img.'.'.$model->pic->extension );
//            }
//            $model->galleriGambarUrl->saveAs(Yii::$app->params['uploadGalery'] . $img . '.' . $model->galleriGambarUrl->extension);
            
//            echo var_dump($img);
//            echo var_dump($model->pic->extension);
//            die();
            $name = $img.'.'.$model->pic->extension;
            $model->galleriGambarUrl-> $name;
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the MGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
