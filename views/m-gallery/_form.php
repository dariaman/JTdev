<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',]); ?>

    <?= $form->field($model, 'galleriJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'galleriDeskripsi')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'galleriTgl')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tgl Galery'],
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-d'
    ]])?>
    <?= $form->field($model, 'pic')->fileInput()->label("Gambar") ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
