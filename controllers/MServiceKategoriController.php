<?php
namespace app\controllers;
use Yii;
use app\models\MServiceKategori;
use app\models\MServiceKategoriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\MService;
/**
 * MServiceKategoriController implements the CRUD actions for MServiceKategori model.
 */
class MServiceKategoriController extends Controller
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
     * Lists all MServiceKategori models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MServiceKategoriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single MServiceKategori model.
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
     * Creates a new MServiceKategori model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MServiceKategori();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->serviceKategoriId]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'data_service' => self::ary_service()
            ]);
        }
    }
    /**
     * Updates an existing MServiceKategori model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->serviceKategoriId]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'data_service' => self::ary_service(),
                'data_status'=>self::ary_status()
            ]);
        }
    }
    /**
     * Deletes an existing MServiceKategori model.
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
     * Finds the MServiceKategori model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MServiceKategori the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MServiceKategori::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}