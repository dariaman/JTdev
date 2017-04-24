<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MVideo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mvideo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'videoUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'videoStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
