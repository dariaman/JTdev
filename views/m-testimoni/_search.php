<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MTestimoniSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtestimoni-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'testiId') ?>

    <?= $form->field($model, 'testiNama') ?>

    <?= $form->field($model, 'testiPekerjaan') ?>

    <?= $form->field($model, 'testiKonten') ?>

    <?= $form->field($model, 'testiFoto') ?>

    <?php // echo $form->field($model, 'testiStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
