<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
//use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
//use kartik\checkbox\CheckboxX;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\datecontrol\DateControl;
//use app\models\MKota;
//use app\models\MKotaQuery;
//use app\models\MKecamatan;
//use app\models\MKecamatanQuery;
//use app\models\MKelurahan;
//use app\models\MKelurahanQuery;
use wbraganca\dynamicform\DynamicFormWidget;

//$dbKota = new MKota();
//$dbKecamatan = new MKecamatan();
//$dbKelurahan = new MKelurahan();
//
//$queryKota = new MKotaQuery($dbKota);
//$queryKecamatan = new MKecamatanQuery($dbKecamatan);
//$queryKelurahan = new MKelurahanQuery($dbKelurahan);
//
//$allKota = $queryKota->all();
//$allKec = $queryKecamatan->all();
//$allKel = $queryKelurahan->all();
//
//$dropDownDataKota = ArrayHelper::map($allKota,'kotaId','kotaNama');
//$dropDownDataKecamatan = ArrayHelper::map($allKec,'kecamatanId','kecamatanNama');
//$dropDownDataKelurahan = ArrayHelper::map($allKel,'kelurahanId','kelurahanNama');

?>

<div class="torder-form">
    
    <?php $form = ActiveForm::begin(['layout' => 'horizontal','id' => 'dynamic-form']); ?>
    
    <div class="row">
        <div class="panel panel-default">            
            <div class="panel-heading"><h5><i class="glyphicon glyphicon-envelope"></i> Order Detail</h5>
        </div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsD[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'serviceDetailId',
                    'kapasitasId',
                    'orderDetailTglKerja',
                    'orderDetailWaktuKerja',
                    'orderDetailQTY',
                    'orderDetailKeluhan',
                    'orderDetailProperti'
                ],
            ]); ?>

            <div class="container-items">
            <?php foreach ($modelsD as $i => $modelD): ?>
                <div class="item panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <div class="pull-right"><button type="button" class="add-item btn btn-success btn-xs">Add Detail <i class="glyphicon glyphicon-plus"></i></button></div>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
//                            if (! $modelD->isNewRecord) {
//                                echo Html::activeHiddenInput($modelD, "[{$i}]id");
//                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]serviceDetailId")->dropDownList($dropDownDataService)->label("ServiceID") ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]orderDetailTglKerja")->widget(DateControl::classname(), [
                                    'options' => ['placeholder' => 'Tanggal Pengerjaan ...'],
                                    'type'=>DateControl::FORMAT_DATE,
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'todayHighlight' => true
                                    ]
                                ])->label("Tgl Pengerjaan"); ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]orderDetailWaktuKerja")->dropDownList($dataJam)->label("Jam Pengerjaan") ?>
                            </div>
                            
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]kapasitasId")->widget(DepDrop::classname(), [
//                                    'data' => ArrayHelper::map(\app\models\MKapasitasDetail::find($geo_record->country_id)->geoCities,'id','caption_en'),
                                    'data' => ArrayHelper::map(\app\models\MKapasitasDetail::find()->all(),'kapasitasId','kapasitasJudul'),
                                    'type'=>DepDrop::TYPE_SELECT2,
                                    'options'=>['placeholder'=>'--Pilih Kategori--'],
                                    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                                    'pluginOptions'=>[
                                        'depends'=>['mservicedetail-serviceid'],
                                        'url'=>Url::toRoute(['/m-service-detail/list-kategori']),
                                        'loadingText' => 'Loading  ...',
                                        'initialize' => true,
                                    ]
                                ])->label("Satuan") ?>
                            </div>
                            
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]orderDetailQTY")->textInput(['maxlength' => true])->label("Qty") ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]orderDetailKeluhan")->textInput(['maxlength' => true])->label("Keluhan") ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelD, "[{$i}]orderDetailProperti")->textInput(['maxlength' => true])->label("Detail Property") ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
        
    </div>
    
    <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>


    <?php ActiveForm::end(); ?>

</div>
