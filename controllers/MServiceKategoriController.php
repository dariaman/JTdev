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
    
    public function actionCreate()
    {
        $model = new MServiceKategori();
        if (Yii::$app->request->IsPost){
            $model->load(Yii::$app->request->post());
            $modelservice = \app\models\MServiceKategori::findOne($model->serviceKategoriId);
            $model->serviceId = $modelservice->serviceId;
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
        if (Yii::$app->request->IsPost){
            $model->load(Yii::$app->request->post());
            $modelservice = \app\models\MServiceKategori::findOne($model->serviceKategoriId);
            $model->serviceId = $modelservice->serviceId;
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
        if (($model = MServiceKategori::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}