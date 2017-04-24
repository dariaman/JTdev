<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MShopDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mshop-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shopDetailId')->textInput() ?>

    <?= $form->field($model, 'shopDetailJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopDetailDeskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopDetailGambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopId')->textInput() ?>

    <?= $form->field($model, 'shopDetailStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
