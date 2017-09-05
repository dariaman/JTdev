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

$orderId = Yii::$app->request->get('id', 'xxx');

$dropDownDataService = ArrayHelper::map(MService::find()->all(), 'serviceId', 'serviceJudul');
$dropDownDataServiceDetail = ArrayHelper::map(MServiceDetail::find()->all(), 'serviceDetailId', 'serviceDetailJudul', 'serviceKategoriId');
$dropDownDataKapasitasDetail = ArrayHelper::map(MKapasitasDetail::find()->all(), 'kapasitasId', 'kapasitasJudul', 'serviceDetailId');
$dropDownDataRekanJt = ArrayHelper::map(MRekanJt::find()->all(), 'rekanId', 'rekanNamaLengkap');
?>

<div class="torder-form">

    <?php $form = ActiveForm::begin(['action' => ['create-detail'], 'layout' => 'horizontal']); ?>

    <?= Html::hiddenInput('orderId', $orderId); ?>

    <?=
    $form->field($model, 'serviceDetailId')->widget(Select2::classname(), [
        'data' => $dropDownDataServiceDetail,
        'options' => ['placeholder' => 'Pilih Service Detail...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Service Product');
    ?>

    <?=
    $form->field($model, 'kapasitasId')->widget(Select2::classname(), [
        'data' => $dropDownDataKapasitasDetail,
        'options' => ['placeholder' => 'Pilih Kapasitas Detail...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Satuan');
    ?>

    <?=
    $form->field($model, 'rekanId')->widget(Select2::classname(), [
       'data' => $dropDownDataRekanJt,
        'options' => ['placeholder' => 'Pilih Rekan JT...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Rekan Tukang');
    ?>

    <?=
    $form->field($model, 'orderDetailTglKerja')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Detil Kerja ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ])->label('Tgl Pengerjaan');
    ?>

    <?= $form->field($model, 'orderDetailWaktuKerja')->widget(TimePicker::classname(), [])->label('Waktu Pengerjaan'); ?>
    <?= $form->field($model, 'orderDetailProperti')->textInput(['maxlength' => true])->label('Properti') ?>

    <?= $form->field($model, 'orderDetailKeluhan')->textArea(['rows' => '2'])->label('Keluhan') ?>

    <?= $form->field($model, 'orderDetailQTY')->textInput(['maxlength' => true])->label('Qty') ?>
    <?= $form->field($model, 'HargaSatuan')->textInput(['maxlength' => true])->label('Harga Satuan') ?>


    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['detail','id'=>$orderId], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
