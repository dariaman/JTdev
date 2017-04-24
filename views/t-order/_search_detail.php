<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderId') ?>

    <?= $form->field($model, 'orderTgl') ?>

    <?= $form->field($model, 'orderJenisBayar') ?>

    <?= $form->field($model, 'orderAlamat') ?>

    <?= $form->field($model, 'orderKota') ?>

    <?php // echo $form->field($model, 'orderKelurahan') ?>

    <?php // echo $form->field($model, 'orderKecamatan') ?>

    <?php // echo $form->field($model, 'orderDaerah') ?>

    <?php // echo $form->field($model, 'orderKodePos') ?>

    <?php // echo $form->field($model, 'orderAlamatNote') ?>

    <?php // echo $form->field($model, 'orderGpsKoordinat') ?>

    <?php // echo $form->field($model, 'orderBiayaTransport') ?>

    <?php // echo $form->field($model, 'orderStatus') ?>

    <?php // echo $form->field($model, 'orderAlamatTambahanId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
