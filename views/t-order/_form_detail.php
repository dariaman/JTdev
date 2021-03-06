<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use app\models\MService;
use app\models\MServiceDetail;
use app\models\MKapasitasDetail;
use app\models\MRekanJt;

$KategoriData = ArrayHelper::map(app\models\MServiceKategori::find()->where(['serviceKategoriStatus' => 1])->all(), 'serviceKategoriId', 'serviceKategoriJudul');
$dropDownDataService = ArrayHelper::map(MService::find()->where(['serviceStatus' => 1])->all(), 'serviceId', 'serviceJudul');
$ServiceDetailData = ArrayHelper::map(MServiceDetail::find()->where(['serviceDetailStatus' => 1])->all(), 'serviceDetailId', 'serviceDetailJudul');
$KapasitasDetailData = ArrayHelper::map(MKapasitasDetail::find()->where(['kapasitasStatus' => 1])->all(), 'kapasitasId', 'kapasitasJudul');

$dropDownDataRekanJt = ArrayHelper::map(MRekanJt::find()->where(['rekanStatus' => 1])->all(), 'rekanId', 'rekanNamaLengkap');

//$orderId = Yii::$app->request->get('id', 'xxx');

//$model->orderId = Yii::$app->request->get('id', 'xxx');
?>

<div class="torder-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'orderId')->hiddenInput()->label(false) ?>

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

        <?php if(!$model->isNewRecord){
            echo $form->field($model, 'orderDetailStatus')->checkbox()->label("Status Aktif");
        }
    ?>
    <hr>
    
    <?=
    $form->field($model, 'StatusPekerjaan')->widget(Select2::classname(), [
        'data' => ['0' => 'Open', '1' => 'Process', '2' => 'Done'],
        'options' => ['placeholder' => 'Status Pekerjaan ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    
    <?= $form->field($model, 'FeedBackWO')->textArea(['rows' => '2'])->label('Catatan Teknisi') ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
