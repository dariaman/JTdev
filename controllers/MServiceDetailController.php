<?php

namespace app\controllers;

use Yii;
use app\models\MServiceDetail;
use app\models\MServiceDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\MService;
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
    /**
     * Displays a single MServiceDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function ary_service(){
        return ArrayHelper::map(MService::find()->all(),'serviceId','serviceJudul');
    }


    
     public function ary_status(){
        $ary_status =[['id'=>'1', 'status'=> 'Active'],
            ['id'=>'0', 'status'=> 'InActive']
        ];
        return ArrayHelper::map($ary_status,'id','status');
    }
     /**
     * Depdrop list kategori
     * @author aditiya
     * @since 1.1.0
     * @return mixed
     */
   public function actionListKategori() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
            $model = MServiceKategori::find()->where(['serviceId'=>$id])
                                                    ->all();
            //$out = self::getSubCatList($cat_id);
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
      
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value->serviceKategoriId,'name'=> $value->serviceKategoriJudul];
               }
            
               echo json_encode(['output'=>$out, 'selected'=>'']);
               return;
           }
       }
       echo Json::encode(['output'=>'', 'selected'=>'']);
   }
    /**
     * Creates a new MServiceDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MServiceDetail();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->serviceDetailId]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'data_service'=>self::ary_service()
            ]);
        }
    }
    /**
     * Updates an existing MServiceDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->serviceDetailId]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'data_service'=>self::ary_service(),
                'data_status'=>self::ary_status()
            ]);
        }
    }
    /**
     * Deletes an existing MServiceDetail model.
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
     * Finds the MServiceDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MServiceDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MServiceDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}