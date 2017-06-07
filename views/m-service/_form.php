<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'serviceJudul')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord){
    ?>

    <?= $form->field($model, 'serviceStatus')->checkbox() ?>

    <?php
    }

    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
