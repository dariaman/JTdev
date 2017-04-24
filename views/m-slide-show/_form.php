<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MSlideShow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mslide-show-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slideUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slideStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
