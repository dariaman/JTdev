<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceKategoriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-kategori-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'serviceKategoriId') ?>

    <?= $form->field($model, 'serviceKategoriJudul') ?>

    <?= $form->field($model, 'serviceKategoriGambarUrl') ?>

    <?= $form->field($model, 'serviceKategoriStatus') ?>

    <?= $form->field($model, 'serviceId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
