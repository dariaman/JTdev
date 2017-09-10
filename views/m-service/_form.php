<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-form">

    <?php $form = ActiveForm::begin([
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
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
