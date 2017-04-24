<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="madmin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adminId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adminPassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adminNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adminStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
