<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'userEmail') ?>

    <?= $form->field($model, 'userNamaDepan') ?>

    <?= $form->field($model, 'userNamaBelakang') ?>

    <?= $form->field($model, 'userKelamin') ?>

    <?php // echo $form->field($model, 'userPassword') ?>

    <?php // echo $form->field($model, 'userAlamat') ?>

    <?php // echo $form->field($model, 'userKota') ?>

    <?php // echo $form->field($model, 'userKelurahan') ?>

    <?php // echo $form->field($model, 'userKecamatan') ?>

    <?php // echo $form->field($model, 'userDaerah') ?>

    <?php // echo $form->field($model, 'userKodePos') ?>

    <?php // echo $form->field($model, 'userNoTelp') ?>

    <?php // echo $form->field($model, 'userNoHp') ?>

    <?php // echo $form->field($model, 'userStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
