<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\MEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mevents-form">

   <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],   
    'id'=>$model->formName(),
    'layout' => 'horizontal'
   ]); ?>


    <?= $form->field($model, 'eventJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventDeskripsi')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'eventTgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter  date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-d'
        ]
    ]) ?>
    
    <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => ['showUpload' => false]
        ])
    ?>
    
    <?php
    if(!$model->isNewRecord){
    ?>



    <?= $form->field($model, 'eventStatus')->checkbox() ?>

    <?php
    }

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
