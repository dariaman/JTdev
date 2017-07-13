<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DailySalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="daily-sales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...','width'=>'100px'],
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'width'=>'100px'
    ]
]) ?>


    <?php // echo $form->field($model, 'unpaid') ?>

    <?php // echo $form->field($model, 'UserUpdate') ?>

    <?php // echo $form->field($model, 'DateUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
