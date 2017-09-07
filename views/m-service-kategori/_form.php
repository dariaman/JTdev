<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MServiceKategori */
/* @var $form yii\widgets\ActiveForm */
$dataService = ArrayHelper::map(app\models\MService::find()->asArray()->all(), 'serviceId', 'serviceJudul');
?>

<div class="mservice-kategori-form">

     <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'serviceKategoriJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serviceKategoriGambarUrl')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'serviceId')->widget(Select2::classname(), [
        'data' => $dataService,
        'options' => ['placeholder' => '--Pilih Service--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])->label('Service') ?>
    
    <?php

        if(!$model->isNewRecord){
            echo $form->field($model, 'serviceKategoriStatus')->checkbox()->label("Status");
        }

    ?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
