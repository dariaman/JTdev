<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MGallerySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mgallery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'galleriId') ?>

    <?= $form->field($model, 'galleriJudul') ?>

    <?= $form->field($model, 'galleriDeskripsi') ?>

    <?= $form->field($model, 'galleriTgl') ?>

    <?= $form->field($model, 'galleriGambarUrl') ?>

    <?php // echo $form->field($model, 'galleriDibuatTgl') ?>

    <?php // echo $form->field($model, 'galleriDibuatOleh') ?>

    <?php // echo $form->field($model, 'galleriStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
