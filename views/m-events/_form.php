<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MEvents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mevents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eventId')->textInput() ?>

    <?= $form->field($model, 'eventJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventDeskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'eventTgl')->textInput() ?>

    <?= $form->field($model, 'eventGambarUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventDibuatTgl')->textInput() ?>

    <?= $form->field($model, 'eventDibuatOleh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eventStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
