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
            $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $image = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString(16,$randomString);
            $image->saveAs(Yii::$app->params['GambarPromo'] . $img . '.' . $image->extension);
            $model->promoGambarUrl='images/Promotions/'. $img . '.' . $image->extension;
            $model->promoTgl = new yii\db\Expression('NOW()');
            $model->promoDibuatOleh = Yii::$app->user->identity->id;
            $model->promoDibuatTgl = new yii\db\Expression('NOW()');
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
            $dataPost =Yii::$app->request->post('MPromo');
            $model->promoJudul = $dataPost["promoJudul"];
            $model->promoDeskripsi = $dataPost["promoDeskripsi"];
            
            $image= UploadedFile::getInstance($model, 'pic');
            if(!empty($image) && $image->size !== 0){
//                delete file existing
                if($model->promoGambarUrl != '' || $model->promoGambarUrl != null){
                    $filegbr = pathinfo($model->promoGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->promoGambarUrl, PATHINFO_EXTENSION);
                }
                $this->deleteFile($filegbr);
                
                $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $img = Yii::$app->security->generateRandomString(16,$randomString);
                $model->promoGambarUrl='images/Promotions/'. $img . '.' . $image->extension;
                $image->saveAs(Yii::$app->params['GambarPromo'] . $img . '.' . $image->extension);
            }
            $model->save(FALSE);
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
        $model = $this->findModel($id);
        if($model->promoGambarUrl != '' || $model->promoGambarUrl != null){
            $filegbr = pathinfo($model->promoGambarUrl,PATHINFO_FILENAME).'.'.pathinfo($model->promoGambarUrl, PATHINFO_EXTENSION);
        }
        $this->deleteFile($filegbr);
        $model->delete();
        
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
    private function deleteFile($filename){
        if(file_exists(Yii::$app->params['GambarEvent'].$filename)){
            unlink(Yii::$app->params['GambarEvent'].$filename);
        }
    }
    
}
