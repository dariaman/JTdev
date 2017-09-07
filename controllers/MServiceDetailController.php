<?php

namespace app\controllers;

use Yii;
use app\models\MServiceDetail;
use app\models\MServiceDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\helpers\ArrayHelper;
//use app\models\MService;
use app\models\MServiceKategori;
/**
 * MServiceDetailController implements the CRUD actions for MServiceDetail model.
 */
class MServiceDetailController extends Controller
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
     * Lists all MServiceDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MServiceDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
  
   public function actionListKategori() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
            $model = MServiceKategori::find()->where(['serviceId'=>$id])
                                                    ->all();
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value->serviceKategoriId,'name'=> $value->serviceKategoriJudul];
               }
            
               echo json_encode(['output'=>$out, 'selected'=>'']);
               return;
           }
       }
       echo Json::encode(['output'=>'', 'selected'=>'']);
   }
   
    public function actionCreate()
    {
        $model = new MServiceDetail();
        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
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
        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    protected function findModel($id)
    {
        if (($model = MServiceDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}