<?php
namespace app\controllers;
use Yii;
use app\models\MKapasitasDetail;
use app\models\MKapasitasDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\MServiceDetail;
use yii\web\UploadedFile;
/**
 * MKapasitasDetailController implements the CRUD actions for MKapasitasDetail model.
 */
class MKapasitasDetailController extends Controller
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
     * Lists all MKapasitasDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MKapasitasDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

      public function ary_service_detail(){
        return ArrayHelper::map(MServiceDetail::find()->all(),'serviceDetailId','serviceDetailJudul');
    }

    
    public function ary_status(){
        $ary_status =[['id'=>'1', 'status'=> 'Active'],
            ['id'=>'0', 'status'=> 'InActive']
        ];
        return ArrayHelper::map($ary_status,'id','status');
    }
    /**
     * Creates a new MKapasitasDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MKapasitasDetail();
        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
            $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $image = UploadedFile::getInstance($model, 'pic');
            $img = Yii::$app->security->generateRandomString(16,$randomString);
            $image->saveAs(Yii::$app->params['GambarProduct'] . $img . '.' . $image->extension);
            $model->kapasitasGambar='images/Product/'. $img . '.' . $image->extension;            
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'data_service_detail'=>self::ary_service_detail()
            ]);
        }
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->IsPost)
        {
            $model->load(Yii::$app->request->post());
            $image= UploadedFile::getInstance($model, 'pic');
            if(!empty($image) && $image->size !== 0){
//                delete file existing
                if($model->kapasitasGambar != '' || $model->kapasitasGambar != null){
                    $filegbr = pathinfo($model->kapasitasGambar,PATHINFO_FILENAME).'.'.pathinfo($model->kapasitasGambar, PATHINFO_EXTENSION);
                    $this->deleteFile($filegbr);
                }
                $randomString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                $img = Yii::$app->security->generateRandomString(16,$randomString);
                $model->kapasitasGambar='images/Product/'. $img . '.' . $image->extension;
                $image->saveAs(Yii::$app->params['GambarProduct'] . $img . '.' . $image->extension);
            }
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
//                'data_status'=>self::ary_status(),
//                'data_service_detail'=>self::ary_service_detail()
            ]);
        }
    }
    
    protected function findModel($id)
    {
        if (($model = MKapasitasDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function deleteFile($filename){
        if(file_exists(Yii::$app->params['GambarProduct'].$filename)){
            unlink(Yii::$app->params['GambarProduct'].$filename);
        }
    }
}