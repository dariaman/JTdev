<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MOfficeHourSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="moffice-hour-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'officeHourId') ?>

    <?= $form->field($model, 'officeHourValue') ?>

    <?= $form->field($model, 'officeHourTitle') ?>

    <?= $form->field($model, 'officeHourStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
