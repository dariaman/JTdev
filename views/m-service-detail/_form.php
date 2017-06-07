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

$dataService = ArrayHelper::map(app\models\MService::find()->asArray()->all(), 'serviceId', 'serviceJudul');
?>

<div class="mservice-detail-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'serviceDetailJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviceDetailDeskripsi')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ])
    ?>

    <?= $form->field($model, 'serviceId')->widget(Select2::classname(), [
        'data' => $dataService,
        'options' => ['placeholder' => '--Pilih Service--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    
    
    
    <?php
    if(!$model->isNewRecord){
    ?>
    
    <?= $form->field($model, 'serviceKategoriId')->widget(DepDrop::classname(), [
        'type'=>DepDrop::TYPE_SELECT2,
        'options'=>['placeholder'=>'--Pilih Kategori--'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['mservicedetail-serviceid'],
            'url'=>Url::toRoute(['/m-service-detail/list-kategori']),
            'loadingText' => 'Loading  ...',
            'initialize' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'serviceDetailStatus')->checkbox() ?>

    <?php
    }

    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
