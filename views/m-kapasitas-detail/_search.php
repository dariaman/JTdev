<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MKapastiasDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mkapasitas-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kapasitasId') ?>

    <?= $form->field($model, 'kapasitasJudul') ?>

    <?= $form->field($model, 'kapasitasHarga') ?>

    <?= $form->field($model, 'kapasitasStatus') ?>

    <?= $form->field($model, 'serviceDetailId') ?>

    <?php // echo $form->field($model, 'kapasitasDeskripsi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
