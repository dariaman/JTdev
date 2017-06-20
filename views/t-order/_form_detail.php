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
?>

<div class="torder-form">
    
    <?php $form = ActiveForm::begin(['action' => ['create-detail'],'layout' => 'horizontal']); ?>
    
    <?= Html::hiddenInput('orderId',$orderId); ?>
    
    <?= $form->field($model, 'serviceDetailId')->widget(Select2::classname(), [
        'data' => $dropDownDataServiceDetail,
        'options' => ['placeholder' => 'Pilih Service Detail...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'kapasitasId')->widget(Select2::classname(), [
        'data' => $dropDownDataKapasitasDetail,
        'options' => ['placeholder' => 'Pilih Kapasitas Detail...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'rekanId')->widget(Select2::classname(), [
//        'data' => $dropDownDataRekanJt,
        'data' => ['Adit' => 'Adit'],
        'options' => ['placeholder' => 'Pilih Rekan JT...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'orderDetailTglKerja')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Detil Kerja ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true
        ]
    ]); ?>
    
    <?= $form->field($model, 'orderDetailWaktuKerja')->widget(TimePicker::classname(), []); ?>
    
    <?= $form->field($model, 'orderDetailKeluhan')->textArea(['rows' => '4']) ?>
    
    <?= $form->field($model, 'orderDetailNote')->textArea(['rows' => '4']) ?>
    
    <?= $form->field($model, 'orderDetailQTY')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'orderDetailProperti')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'orderDetailStatus')->checkbox(['label' => 'Active']); ?>

    <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


    <?php ActiveForm::end(); ?>

</div>
