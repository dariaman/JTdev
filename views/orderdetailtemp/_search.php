<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderdetailtempSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetailtemp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'serviceDetailId') ?>

    <?= $form->field($model, 'kapasitasId') ?>

    <?= $form->field($model, 'TglKerja') ?>

    <?= $form->field($model, 'WaktuKerja') ?>

    <?php // echo $form->field($model, 'Keluhan') ?>

    <?php // echo $form->field($model, 'QTY') ?>

    <?php // echo $form->field($model, 'DetailProperti') ?>

    <?php // echo $form->field($model, 'totalHarga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
