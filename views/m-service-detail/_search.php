<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'serviceDetailId') ?>

    <?= $form->field($model, 'serviceDetailJudul') ?>

    <?= $form->field($model, 'serviceDetailDeskripsi') ?>

    <?= $form->field($model, 'serviceDetailGambar') ?>

    <?= $form->field($model, 'serviceKategoriId') ?>

    <?php // echo $form->field($model, 'serviceId') ?>

    <?php // echo $form->field($model, 'serviceDetailStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
