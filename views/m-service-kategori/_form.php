<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MServiceKategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-kategori-form">

     <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'serviceKategoriJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviceKategoriGambarUrl')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord){
    ?>

        <?= $form->field($model, 'serviceKategoriStatus')->widget(Select2::classname(), [
        'data' => $data_status,
        'options' => ['placeholder' => 'Select a ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?php
        }
    ?>

    <?= $form->field($model, 'serviceId')->widget(Select2::classname(), [
	    'data' => $data_service,
	    'options' => ['placeholder' => 'Select a ...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	])->label('Service') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>