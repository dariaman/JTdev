<?php

use yii\helpers;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$model = new app\models\TOrderDetail();

$servList=ArrayHelper::map(app\models\MService::find()->all(), 'serviceId', 'serviceJudul' );  

$form = ActiveForm::begin(['layout' => 'horizontal']); 

echo $form->field($model, 'serviceId')->dropDownList(\app\models\MService::getList(), ['id' => 'service-id', 'class'=>'input-large form-control']); 

echo $form->field($model, 'serviceDetailId')->widget(DepDrop::classname(), [
            'options'=>['id'=>'service-detail-id'], 
            'pluginOptions'=>[
            'depends'=>['service-id'], // the id for cat attribute
            'placeholder'=>'Select...',
            'url'=>  Url::to(['t-order/list-services-detail'])
        ]]);

echo $form->field($model, 'kapasitasId')->widget(DepDrop::classname(), [
            'options'=>['id'=>'service-kapasitasId'], 
            'pluginOptions'=>[
            'depends'=>['service-detail-id'], // the id for cat attribute
            'placeholder'=>'Select...',
            'url'=>  Url::to(['t-order/list-kapasitas'])
        ]]);
ActiveForm::end();