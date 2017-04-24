<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MInternetBanking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minternet-banking-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal',]); ?>

    <?= $form->field($model, 'ibankJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ibankStatus')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
