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

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',]); ?>

    <?= $form->field($model, 'promoJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promoDeskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'promoTgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tgl Galery'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-d'
    ]])?>
    
    <?= $form->field($model, 'pic')->fileInput()->label("Gambar") ?>

<?= $model->isNewRecord ? '' : $form->field($model, 'promoStatus')->checkbox() ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
