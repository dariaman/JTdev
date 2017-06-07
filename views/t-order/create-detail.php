<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;
use kartik\checkbox\CheckboxX;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\models\MService;
use app\models\MServiceDetail;
use app\models\MServiceQuery;
use app\models\MServiceDetailQuery;
use app\models\MKapasitasDetail;
use app\models\MKapasitasDetailQuery;
use app\models\MRekanJt;
use app\models\MRekanJtQuery;

/* @var $this yii\web\View */
/* @var $model app\models\TOrder */
/* @var $form yii\widgets\ActiveForm */

$orderId = Yii::$app->request->get('id','xxx');

$dbService = new MService();
$dbServiceDetail = new MServiceDetail();
$dbKapasitas = new MKapasitasDetail();
$dbRekan = new MRekanJt();

$queryService = new MServiceQuery($dbService);
$queryServiceDetail = new MServiceDetailQuery($dbServiceDetail);
$queryKapasitasDetail = new MKapasitasDetailQuery($dbKapasitas);
$queryRekanJt = new MRekanJtQuery($dbRekan);

$allService = $queryService->all();
$allServiceDetail = $queryServiceDetail->all();
$allKapasitasDetail = $queryKapasitasDetail->all();
$allRekanJT = $queryRekanJt->all();

$dropDownDataService = ArrayHelper::map($allService,'serviceId','serviceJudul');
$dropDownDataServiceDetail = ArrayHelper::map($allServiceDetail,'serviceDetailId','serviceDetailJudul','serviceKategoriId');
$dropDownDataKapasitasDetail = ArrayHelper::map($allKapasitasDetail,'kapasitasId','kapasitasJudul','serviceDetailId');
$dropDownDataRekanJt = ArrayHelper::map($allRekanJT,'rekanId','rekanNamaLengkap');

$this->title = 'Order Detail';
$this->params['breadcrumbs'][] = ['label' => 'orderDetail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="torder-form">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['action' => ['create-detail'],'layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'serviceId')->dropDownList($dropDownDataService, ['id'=>'service-id'])->label("Service") ?>
    <?= $form->field($model, 'serviceDetailId')->widget(DepDrop::classname(), [
            'options' => ['id'=>'service-detail-id'],
            'pluginOptions'=>[
                'depends'=>['service-id'],
                'placeholder' => 'Select...',
                'url' => Url::to(['/t-order/list-services-detail'])
            ]
        ])->label("Service Detail") ?>
    <?= $form->field($model, 'kapasitasId')->widget(DepDrop::classname(), [
            'options' => ['id'=>'kapasitas-id'],
            'pluginOptions'=>[
                'depends'=>['service-detail-id'],
                'placeholder' => 'Select...',
                'url' => Url::to(['/t-order/list-kapasitas'])
            ]
        ])->label("Satuan") ?>

    <?= $form->field($model, 'orderDetailTglKerja')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Detil Kerja ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true
        ]
    ]); ?>
    <?= $form->field($model, 'orderDetailWaktuKerja')->widget(TimePicker::classname(), []); ?>
    <?= $form->field($model, 'orderDetailQTY')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'orderDetailProperti')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'orderDetailKeluhan')->textArea(['rows' => '4']) ?>
    
    
    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
