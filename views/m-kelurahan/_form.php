<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

$dataKota = ArrayHelper::map(app\models\MKota::find()->all(), 'kotaId', 'kotaNama');
$dataKec = ArrayHelper::map(app\models\MKecamatan::find()->all(), 'kecamatanId', 'kecamatanNama');
?>

<div class="mkelurahan-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'kotaId')->dropDownList($dataKota, [
    	'id'=>'kota-id','prompt'=>'-- Pilih Kota --'
    ])->label("Kota") ?>


    <?= $form->field($model, 'kecamatanId')->widget(DepDrop::classname(), [
    		'data'=> $dataKec,
		    'options'=>['id'=>'kec-id'],
		    'pluginOptions'=>[
		        'depends'=>['kota-id'],
		        'initialize' => true,
		        'placeholder'=>'-- Pilih Kecamatan --',
		        'url'=>Url::to(['m-kelurahan/list-kec'])
		    ]
		])->label("Kecamatan") ?>

    <?= $form->field($model, 'kelurahanNama')->textInput(['maxlength' => true])->label("Kelurahan") ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
