<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MRekanJtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrekan-jt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rekanId') ?>

    <?= $form->field($model, 'rekanNamaLengkap') ?>

    <?= $form->field($model, 'rekanKelamin') ?>

    <?= $form->field($model, 'rekanSpesifikasi') ?>

    <?= $form->field($model, 'rekanAlamat') ?>

    <?php // echo $form->field($model, 'rekanEmail') ?>

    <?php // echo $form->field($model, 'rekanWebsite') ?>

    <?php // echo $form->field($model, 'rekanKota') ?>

    <?php // echo $form->field($model, 'rekanKelurahan') ?>

    <?php // echo $form->field($model, 'rekanKecamatan') ?>

    <?php // echo $form->field($model, 'rekanDaerah') ?>

    <?php // echo $form->field($model, 'rekanKodePos') ?>

    <?php // echo $form->field($model, 'rekanNoHp') ?>

    <?php // echo $form->field($model, 'rekanKendaraan') ?>

    <?php // echo $form->field($model, 'rekanKendaraanNopol') ?>

    <?php // echo $form->field($model, 'rekanStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
