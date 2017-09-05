<?php

namespace app\controllers;

use Yii;
use app\models\TOrder;
use app\models\TOrderSearch;
use app\models\TOrderDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\Json;

/**
 * TOrderController implements the CRUD actions for TOrder model.
 */
class TOrderController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all TOrder models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TOrder();

        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
            return $this->redirect(['create-detail', 'id' => $model->orderId]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = 'blank';
        $model = $this->findModel($id);

        if (Yii::$app->request->IsPost) {
            $model->load(Yii::$app->request->post());
            $model->save(false);
            return $this->redirect(['detail', 'id' => $model->orderId]);
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdateDetail($id) {
        $this->layout = 'blank';
        $model = $this->findOrderDetail($id);

        if (Yii::$app->request->IsPost) {
            $model->load(Yii::$app->request->post());
            $model->save(false);
            return $this->redirect(['detail', 'id' => $model->orderId]);
        } else {
            return $this->renderAjax('create-detail', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Finds the TOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findOrderDetail($id) {
        $model = TOrderDetail::findOne($id);
        return $model;
    }

    protected function findOrderDetailList($id) {
        $model = TOrderDetail::find()->where(['=', 'orderId', $id]);
        return $model;
    }

    public function actionDetail($id) {
//        Yii::$app->session->setFlash('success', 'Model has been saved');

        $subQuery = TOrderDetail::find()->select('orderId, SUM(`HargaSatuan` * `orderDetailQTY`) as total ')->where(['orderId' => $id]);
        $modelh = TOrder::find($id)->select(['t_order.*', 'T.total',])
                ->leftJoin(['T' => $subQuery], 'T.orderId = t_order.orderId')
                ->where(['t_order.orderId' => $id])
                ->one();

        $dataProvider = new ActiveDataProvider([
            'query' => TOrderDetail::find()
                    ->where(['=', 'orderId', $id]),
            'sort' => ['defaultOrder' => ['orderDetailId' => SORT_ASC]]
        ]);

//        echo var_dump($modelh);
//        die();

        return $this->render('detail', [
                    'modelh' => $modelh,
                    'modeld' => $dataProvider,
        ]);
    }

    public function actionCreateDetail() {
        $this->layout = 'blank';
        $model = new TOrderDetail();

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('TOrderDetail');
            $orderDetailTgl = $request['orderDetailTglKerja'];
            $toDate = date('Y-m-d', strtotime($orderDetailTgl));
            $model->orderId = Yii::$app->request->post('orderId');
            $model->orderDetailTglKerja = $toDate;

            $model->save(false);
            return $this->redirect(['detail', 'id' => $model->orderId]);
        } else {
            return $this->renderAjax('create-detail', [
                        'model' => $model,
            ]);
        }
    }

    public function actionInboundOrder() {
        $modelH = new TOrder();
        $modelsD = [new TOrderDetail()];
        $dropDownDataService = \yii\helpers\ArrayHelper::map(\app\models\MServiceDetail::find()->all(), 'serviceDetailId', 'serviceDetailJudul');
        $dataJam = \yii\helpers\ArrayHelper::map(\app\models\MOfficeHour::find()->all(), 'officeHourId', 'officeHourTitle');

        if (Yii::$app->request->isPost) {
            
        } else {
            return $this->render('Inbound-Order', [
                        'modelH' => $modelH,
                        'modelsD' => (empty($modelsD)) ? [new TOrderDetail()] : $modelsD,
                        'dropDownDataService' => $dropDownDataService,
                        'dataJam' => $dataJam,
            ]);
        }
    }

    public function actionListKec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kota_id = $parents[0];
                $model = \app\models\MKecamatan::find()->where(['kotaId' => $parents[0]])->all();
                foreach ($model as $key => $value) {
                    $out[] = ['id' => $value->kecamatanId, 'name' => $value->kecamatanNama];
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionListKel() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kota_id = $parents[0];
                $model = \app\models\MKelurahan::find()->where(['kelurahanId' => $parents[0]])->all();
                foreach ($model as $key => $value) {
                    $out[] = ['id' => $value->kelurahanId, 'name' => $value->kelurahanNama];
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionInbound() {
        $modelH = new TOrder();
        $modelsD = [new TOrderDetail()];
        $dropDownDataService = \yii\helpers\ArrayHelper::map(\app\models\MServiceDetail::find()->all(), 'serviceDetailId', 'serviceDetailJudul');
        $dataJam = \yii\helpers\ArrayHelper::map(\app\models\MOfficeHour::find()->all(), 'officeHourId', 'officeHourTitle');

        if (Yii::$app->request->isPost) {
            
        } else {
            return $this->render('Inbound', [
                        'modelH' => $modelH,
                        'modelsD' => (empty($modelsD)) ? [new TOrderDetail()] : $modelsD,
                        'dropDownDataService' => $dropDownDataService,
                        'dataJam' => $dataJam,
            ]);
        }
    }

    public function actionWo() {
        $searchModel = new TOrderSearch();
        $dataProvider = $searchModel->searchWo(Yii::$app->request->queryParams);

        return $this->render('wo', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateRekan($id) {
        $this->layout = 'blank';
        $model = $this->findOrderDetail($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(Yii::$app->request->post('back', '/t-order/wo'));
        } else {
            return $this->render('_formUpdateRekan', [
                        'model' => $model,
                        'back' => Yii::$app->request->referrer
            ]);
        }
    }

    public function actionPrintWo($rekanid, $orderid) {
        // get your HTML raw content without any layouts or scripts

        $content = $this->renderPartial('renderwo', ['rekanid' => $rekanid, 'orderid' => $orderid]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'filename' => 'WO',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Work Order'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Jago Tukang'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionPrintInv($orderid) {
        // get your HTML raw content without any layouts or scripts

        $content = $this->renderPartial('renderinv', ['orderid' => $orderid]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'filename' => 'WO',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Work Order'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Jago Tukang'],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionListServicesDetail() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $model = \app\models\MServiceDetail::find()->where(['serviceId' => $parents[0]])->all();
                foreach ($model as $key => $value) {
                    $out[] = ['id' => $value->serviceDetailId, 'name' => $value->serviceDetailJudul];
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
        return;
    }

    public function actionListKapasitas() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $model = \app\models\MKapasitasDetail::find()->where(['serviceDetailId' => $parents[0]])->all();
                foreach ($model as $key => $value) {
                    $out[] = ['id' => $value->kapasitasId,
                        'name' => $value->kapasitasJudul . ' - ' . Yii::$app->formatter->format($value->kapasitasHarga, 'decimal')];
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
        return;
    }

}
