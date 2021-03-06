<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use app\models\MServiceDetail;

/* @var $this yii\web\View */
/* @var $model app\models\MKapasitasDetail */
/* @var $form yii\widgets\ActiveForm */

$dataservicedetail = ArrayHelper::map(MServiceDetail::find()->all(),'serviceDetailId','serviceDetailJudul');
?>

<div class="mkapasitas-detail-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
    ]); ?>
    
    <?= $form->field($model, 'serviceDetailId')->widget(Select2::classname(), [
        'data' => $dataservicedetail,
        'options' => ['placeholder' => '--Pilih Service Detail--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Service Detail') ?>
    <?= $form->field($model, 'kapasitasHarga')->textInput(['maxlength' => true])->label('Harga Satuan') ?>
    <?= $form->field($model, 'kapasitasJudul')->textInput(['maxlength' => true])->label('Keterangan Satuan') ?>

    <?= $form->field($model, 'kapasitasDeskripsi')->textarea(['rows' => 6])->label('Deskripsi') ?>
    <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ])->label('Gambar Product')
    ?>
        
    <?php
    if(!$model->isNewRecord){
        echo $form->field($model, 'kapasitasStatus')->checkbox();
    }

    ?>
    
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
