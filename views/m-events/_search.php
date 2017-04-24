<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mevents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'eventId') ?>

    <?= $form->field($model, 'eventJudul') ?>

    <?= $form->field($model, 'eventDeskripsi') ?>

    <?= $form->field($model, 'eventTgl') ?>

    <?= $form->field($model, 'eventGambarUrl') ?>

    <?php // echo $form->field($model, 'eventDibuatTgl') ?>

    <?php // echo $form->field($model, 'eventDibuatOleh') ?>

    <?php // echo $form->field($model, 'eventStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
