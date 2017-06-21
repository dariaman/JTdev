<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TOrderDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torder-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderId')->textInput() ?>

    <?= $form->field($model, 'serviceDetailId')->textInput() ?>

    <?= $form->field($model, 'kapasitasId')->textInput() ?>

    <?= $form->field($model, 'rekanId')->textInput() ?>

    <?= $form->field($model, 'orderDetailTglKerja')->textInput() ?>

    <?= $form->field($model, 'orderDetailWaktuKerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderDetailKeluhan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderDetailNote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderDetailQTY')->textInput() ?>

    <?= $form->field($model, 'orderDetailProperti')->textInput(['maxlength' => true]) ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
