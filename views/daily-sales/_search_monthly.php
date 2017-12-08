<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\DailySalesSearch */
/* @var $form yii\widgets\ActiveForm */

$tglSkrg = new DateTime();

for($i='2017';$i<=date("Y");$i++){ $tahun[$i]=$i; }

$model->tahun = $model->tahun ?? date("Y");

?>

<div class="daily-sales-search">

    <?php $form = ActiveForm::begin([
//        'action' => ['index'],
        'layout' => 'horizontal',
        'method' => 'post',
    ]); ?>

    <?=
    $form->field($model, 'tahun')->widget(Select2::classname(), [
        'data' =>$tahun ,
        'options' => ['placeholder' => 'Tahun ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    

    <p align="center">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </p>

    <?php ActiveForm::end(); ?>

</div>
