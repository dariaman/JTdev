<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TOrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torder-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderDetailId') ?>

    <?= $form->field($model, 'orderId') ?>

    <?= $form->field($model, 'serviceDetailId') ?>

    <?= $form->field($model, 'kapasitasId') ?>

    <?= $form->field($model, 'rekanId') ?>

    <?php // echo $form->field($model, 'orderDetailTglKerja') ?>

    <?php // echo $form->field($model, 'orderDetailWaktuKerja') ?>

    <?php // echo $form->field($model, 'orderDetailKeluhan') ?>

    <?php // echo $form->field($model, 'orderDetailNote') ?>

    <?php // echo $form->field($model, 'orderDetailStatus') ?>

    <?php // echo $form->field($model, 'orderDetailQTY') ?>

    <?php // echo $form->field($model, 'orderDetailProperti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
