<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MPromoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mpromo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'promoId') ?>

    <?= $form->field($model, 'promoJudul') ?>

    <?= $form->field($model, 'promoDeskripsi') ?>

    <?= $form->field($model, 'promoTgl') ?>

    <?= $form->field($model, 'promoGambarUrl') ?>

    <?php // echo $form->field($model, 'promoDibuatTgl') ?>

    <?php // echo $form->field($model, 'promoDibuatOleh') ?>

    <?php // echo $form->field($model, 'promoStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
