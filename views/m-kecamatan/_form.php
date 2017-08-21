<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\MKecamatan */
/* @var $form yii\widgets\ActiveForm */
$dataKota = ArrayHelper::map(app\models\MKota::find()->asArray()->all(), 'kotaId', 'kotaNama');

?>

<div class="mkecamatan-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'kecamatanNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kotaId')->widget(Select2::classname(), [
	        'data' => $dataKota,
	        'options' => ['placeholder' => '--Pilih Service--'],
	    	'pluginOptions' => ['allowClear' => true],
        ])->label("Kota")
    ?>
    
    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
