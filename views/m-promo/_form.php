<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\MPromo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mpromo-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'promoJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promoDeskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'promoTgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tgl Galery'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-d'
    ]])?>


    <?= $form->field($model, 'promoGambarUrl')->widget(FileInput::classname(), 
            [ 
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
//                'uploadUrl' => Url::to(['/site/file-upload']),
//                'initialPreviewAsData'=>false,
            ]])?>

<?= $model->isNewRecord ? '' : $form->field($model, 'promoStatus')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
