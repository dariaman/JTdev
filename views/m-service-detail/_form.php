<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */
/* @var $form yii\widgets\ActiveForm */

$dataService = ArrayHelper::map(app\models\MServiceKategori::find()->asArray()->all(), 'serviceKategoriId', 'serviceKategoriJudul');
?>

<div class="mservice-detail-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
    ]); ?>
    
    <?= $form->field($model, 'serviceKategoriId')->widget(Select2::classname(), [
        'data' => $dataService,
        'options' => ['placeholder' => '--Pilih Service Kategori--'],
        
    ])->label('Service Kategori') ?>

    <?= $form->field($model, 'serviceDetailJudul')->textInput(['maxlength' => true])->label('Product Judul') ?>

    <?= $form->field($model, 'serviceDetailDeskripsi')->textarea(['rows' => 6])->label('Deskripsi') ?>
    
    <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ])->label('Gambar Product')
    ?>

    <?php
    if(!$model->isNewRecord){
        echo $form->field($model, 'serviceDetailStatus')->checkbox();
    }

    ?>
    
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
