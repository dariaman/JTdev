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
        ]) ?>
    
    <?php
    if(!$model->isNewRecord){
    ?>

    <?= $form->field($model, 'serviceKategoriStatus')->checkbox() ?>

    <?php
    }

    ?>    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
