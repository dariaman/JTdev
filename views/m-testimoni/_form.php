<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MTestimoni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mtestimoni-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'testiNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'testiPekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'testiKonten')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'testiFoto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'testiStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
