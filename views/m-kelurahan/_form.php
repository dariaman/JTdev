<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MKelurahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mkelurahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelurahanNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatanId')->textInput() ?>

    <?= $form->field($model, 'hargaDaerah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
