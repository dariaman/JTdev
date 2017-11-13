<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;

$dataKota = ArrayHelper::map(app\models\MKota::find()->asArray()->all(), 'kotaId', 'kotaNama');
$dataKec = ArrayHelper::map(app\models\MKecamatan::find()->asArray()->all(), 'kecamatanId', 'kecamatanNama');
$dataKel = ArrayHelper::map(app\models\MKelurahan::find()->asArray()->all(), 'kelurahanId', 'kelurahanNama');

$list = ['L'=>'Laki-laki','P'=>'Perempuan'];
?>

<div class="mrekan-jt-form">

    <?php $form = ActiveForm::begin([
                        'type' => ActiveForm::TYPE_HORIZONTAL,
                        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
                    ]); ?>

    <?= $form->field($model, 'rekanNamaLengkap')->textInput()->label("Nama Lengkap") ?>

    <?= $form->field($model, 'rekanKelamin')->radioList($list,['inline'=>true])->label("Jenis Kelamin"); ?>

    <?= $form->field($model, 'rekanSpesifikasi')->textInput(['maxlength' => false])->label("Spesialisasi") ?>

    <?= $form->field($model, 'rekanNoHp')->input('number')->label("No HP") ?>
    <?= $form->field($model, 'rekanEmail')->textInput(['maxlength' => false])->label("Email") ?>
    <?= $form->field($model, 'rekanAlamat')->textarea(['rows' => 2])->label("Alamat") ?>

    <?= $form->field($model, 'rekanKota')->dropDownList($dataKota, [
        'id'=>'kota-id','prompt'=>'-- Pilih Kota --'
    ])->label("Kota") ?>

    <?= $form->field($model, 'rekanKecamatan')->widget(DepDrop::classname(), [
            'data'=> $dataKec,
            'options'=>['id'=>'kec-id'],
            'pluginOptions'=>[
                'depends'=>['kota-id'],
                'initialize' => true,
                'placeholder'=>'-- Pilih Kecamatan --',
                'url'=>Url::to(['m-kelurahan/list-kec'])
            ]
        ])->label("Kecamatan") ?>

    <?= $form->field($model, 'rekanKelurahan')->widget(DepDrop::classname(), [
            'data'=> $dataKel,
            'options'=>['id'=>'kel-id'],
            'pluginOptions'=>[
                'depends'=>['kec-id'],
                'initialize' => true,
                'placeholder'=>'-- Pilih Kelurahan --',
                'url'=>Url::to(['m-kelurahan/list-kel'])
            ]
        ])->label("Kelurahan") ?>

    <?= $form->field($model, 'rekanKodePos')->textInput(['type' => 'number','maxlength' =>5])->label("Kode Pos") ?>

        <?php if(!$model->isNewRecord){
            echo $form->field($model, 'rekanStatus')->checkbox();
        }
    ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
