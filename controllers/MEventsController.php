<?php

namespace app\controllers;

use Yii;
use app\models\MEvents;
use app\models\MEventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * MEventsController implements the CRUD actions for MEvents model.
 */
class MEventsController extends Controller
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
     * Lists all MEvents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MEventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MEvents model.
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
     * Creates a new MEvents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MEvents();
        if ($model->load(Yii::$app->request->post())) {
            $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $model->eventGambarUrl = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString(16,$randomString);
            $model->eventGambarUrl->saveAs(Yii::$app->params['GambarEvent'] . $img . '.' . $model->eventGambarUrl->extension);
            $model->eventGambarUrl= $img . '.' . $model->eventGambarUrl->extension;
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MEvents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $dataPost =Yii::$app->request->post('MEvents');
            $model->eventJudul = $dataPost["eventJudul"];
            $model->eventDeskripsi = $dataPost["eventDeskripsi"];
            
            $image= UploadedFile::getInstance($model, 'pic');
            if(!empty($image) && $image->size !== 0){
//                delete file existing
                if($model->eventGambarUrl != '' || $model->eventGambarUrl != null){
                    $filegbr = pathinfo($model->eventGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->eventGambarUrl, PATHINFO_EXTENSION);
                }
                $this->deleteFile($filegbr);
                
                $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $img = Yii::$app->security->generateRandomString(16,$randomString);
                $model->eventGambarUrl= $img . '.' . $image->extension;
//                echo var_dump(Yii::$app->params['GambarEvent']);
//                echo var_dump($img);
//                echo var_dump($image->extension);
//                echo var_dump($model->eventGambarUrl);
                $image->saveAs(Yii::$app->params['GambarEvent'] . $img . '.' . $image->extension);
            }
//            echo var_dump($model);
//            die();;
            $model->save(FALSE);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MEvents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->eventGambarUrl != '' || $model->eventGambarUrl != null){
            $filegbr = pathinfo($model->eventGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->eventGambarUrl, PATHINFO_EXTENSION);
        }
        $this->deleteFile($filegbr);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the MEvents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MEvents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MEvents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function deleteFile($filename){
        if(file_exists(Yii::$app->params['GambarEvent'].$filename)){
            unlink(Yii::$app->params['GambarEvent'].$filename);
        }
    }
}
