<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNamaDepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNamaBelakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userPassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userAlamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userDaerah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNoTelp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNoHp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userStatus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
