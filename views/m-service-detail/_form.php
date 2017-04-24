<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-detail-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal',
    ]); ?>

    <?= $form->field($model, 'serviceDetailJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviceDetailDeskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serviceDetailGambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviceId')->widget(Select2::classname(), [
        'data' => $data_service,
        'options' => ['placeholder' => 'Select a ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Service') ?>

    <?= $form->field($model, 'serviceKategoriId')->widget(DepDrop::classname(), [
        'type'=>DepDrop::TYPE_SELECT2,
        'options'=>['placeholder'=>'Select ...'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['mservicedetail-serviceid'],
            'url'=>Url::toRoute(['/m-service-detail/list-kategori']),
             'loadingText' => 'Loading  ...',
              'initialize' => true,
        ]
    ])->label('Kategori Service') ?>

      <?php
    if(!$model->isNewRecord){
    ?>

        <?= $form->field($model, 'serviceDetailStatus')->widget(Select2::classname(), [
        'data' => $data_status,
        'options' => ['placeholder' => 'Select a ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?php
        }
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>