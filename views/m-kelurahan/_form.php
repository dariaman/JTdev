<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MKelurahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelurahan-form">

    
    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'kelurahanNama')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'kecamatanId')->widget(Select2::classname(), [
        'data' => $data_kecamatan,
        'options' => ['placeholder' => 'Select a ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

     <?=  $form->field($model, 'hargaDaerah')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => 'RP ',
            'allowNegative' => false
        ]
    ]) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
