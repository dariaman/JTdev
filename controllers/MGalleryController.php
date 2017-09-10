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
     * Creates a new MGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MGallery();

        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
            $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $image = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString(16,$randomString);
            $image->saveAs(Yii::$app->params['uploadGalery'] . $img . '.' . $image->extension);
            $model->galleriGambarUrl='images/Gallery/'. $img . '.' . $image->extension;
            $model->galleriTgl = new yii\db\Expression('NOW()');
            $model->galleriDibuatOleh = Yii::$app->user->identity->id;
            $model->galleriDibuatTgl = new yii\db\Expression('NOW()');
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdate($id){
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $dataPost =Yii::$app->request->post('MGallery');
            $model->galleriJudul = $dataPost["galleriJudul"];
            $model->galleriDeskripsi = $dataPost["galleriDeskripsi"];
            $image= UploadedFile::getInstance($model, 'pic');
            if(!empty($image) && $image->size !== 0){
//                delete file existing
                if($model->galleriGambarUrl != '' || $model->galleriGambarUrl != null){
                    $filegbr = pathinfo($model->galleriGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->galleriGambarUrl, PATHINFO_EXTENSION);
                }
                $this->deleteFile($filegbr);
                $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $img = Yii::$app->security->generateRandomString(16,$randomString);
                $model->galleriGambarUrl='images/Gallery/'. $img . '.' . $image->extension;
                $image->saveAs(Yii::$app->params['uploadGalery'] . $img . '.' . $image->extension);
            }
            $model->save(FALSE);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->galleriGambarUrl != '' || $model->galleriGambarUrl != null){
            $filegbr = pathinfo($model->galleriGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->galleriGambarUrl, PATHINFO_EXTENSION);
        }
        $this->deleteFile($filegbr);
        $model->delete();
        
        return $this->redirect(['index']);
    }
    
    protected function findModel($id)
    {
        if (($model = MGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function deleteFile($filename){
        if(file_exists(Yii::$app->params['uploadGalery'].$filename)){
            unlink(Yii::$app->params['uploadGalery'].$filename);
        }
    }
}
