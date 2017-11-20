<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\DailySalesSearch */
/* @var $form yii\widgets\ActiveForm */

$tglSkrg = new DateTime();
?>

<div class="daily-sales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'layout' => 'horizontal',
        'method' => 'post',
    ]); ?>


    <?= $form->field($model, 'tgl')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Date From ...','width'=>'100px'],
    'value' => $tglSkrg,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'width'=>'100px'
    ]])->label("Dari tanggal") ?>
    
    <?= $form->field($model, 'dateTo')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Date To ...','width'=>'100px'],
    'value' => $tglSkrg,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'width'=>'100px'
    ]])->label("Sampai tanggal") ?>

    <p align="center">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </p>

    <?php ActiveForm::end(); ?>

</div>
