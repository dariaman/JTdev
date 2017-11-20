<?php

namespace app\controllers;

use Yii;
use app\models\DailySales;
use app\models\DailySalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DailySalesController implements the CRUD actions for DailySales model.
 */
class DailySalesController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all DailySales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DailySalesSearch();
        if (Yii::$app->request->IsPost){
            $param = Yii::$app->request->post('DailySalesSearch');
            $searchModel->load(Yii::$app->request->post());
            $searchModel->dateTo = $param['dateTo'];
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = DailySales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
