<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;
use kartik\checkbox\CheckboxX;
use kartik\widgets\DepDrop;
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

$KategoriData = ArrayHelper::map(app\models\MServiceKategori::find()->all(), 'serviceKategoriId', 'serviceKategoriJudul');
$dropDownDataService = ArrayHelper::map(MService::find()->all(), 'serviceId', 'serviceJudul');
$ServiceDetailData = ArrayHelper::map(MServiceDetail::find()->all(), 'serviceDetailId', 'serviceDetailJudul');
$KapasitasDetailData = ArrayHelper::map(MKapasitasDetail::find()->all(), 'kapasitasId', 'kapasitasJudul');

$dropDownDataRekanJt = ArrayHelper::map(MRekanJt::find()->all(), 'rekanId', 'rekanNamaLengkap');
?>

<div class="torder-form">

    <?php $form = ActiveForm::begin(['action' => ['create-detail'], 'layout' => 'horizontal']); ?>

    <?= Html::hiddenInput('orderId', $orderId); ?>

    <?=
    $form->field($model, 'kategoriID')->dropDownList($KategoriData, [
        'id' => 'Kategori-id',
        'prompt' => '-- Kategori Service --'
    ])->label("Kategori Service")
    ?>

    <?=
    $form->field($model, 'serviceDetailId')->widget(DepDrop::classname(), [
        'data' => $ServiceDetailData,
        'options' => ['id' => 'detail-id'],
        'pluginOptions' => [
            'depends' => ['Kategori-id'],
            'initialize' => true,
            'placeholder' => '-- Service Detail --',
            'url' => Url::to(['t-order/list-services-detail'])
        ]
    ])->label("Service Detail")
    ?>
    
    <?=
    $form->field($model, 'kapasitasId')->widget(DepDrop::classname(), [
        'data' => $KapasitasDetailData,
        'options' => ['id' => 'kapasitas-id'],
        'pluginOptions' => [
            'depends' => ['detail-id'],
            'initialize' => true,
            'placeholder' => '-- Satuan Harga --',
            'url' => Url::to(['t-order/list-kapasitas'])
        ]
    ])->label("Satuan Harga")
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


    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancel', ['detail', 'id' => $orderId], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
