<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MUserAlamatTambahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-alamat-tambahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alamatId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'userAlamat') ?>

    <?= $form->field($model, 'userKota') ?>

    <?= $form->field($model, 'userKelurahan') ?>

    <?php // echo $form->field($model, 'userKecamatan') ?>

    <?php // echo $form->field($model, 'userDaerah') ?>

    <?php // echo $form->field($model, 'userKodePos') ?>

    <?php // echo $form->field($model, 'alamatStatus')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
