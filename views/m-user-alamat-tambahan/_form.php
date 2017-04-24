<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MUserAlamatTambahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-alamat-tambahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'userAlamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userDaerah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamatStatus')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
