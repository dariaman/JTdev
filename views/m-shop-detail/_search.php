<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MShopDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mshop-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shopDetailId') ?>

    <?= $form->field($model, 'shopDetailJudul') ?>

    <?= $form->field($model, 'shopDetailDeskripsi') ?>

    <?= $form->field($model, 'shopDetailGambar') ?>

    <?= $form->field($model, 'shopId') ?>

    <?php // echo $form->field($model, 'shopDetailStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
