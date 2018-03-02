<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\MUser */
/* @var $form yii\widgets\ActiveForm */

$dataKota = ArrayHelper::map(app\models\MKota::find()->all(), 'kotaId', 'kotaNama');
$dataKec = ArrayHelper::map(app\models\MKecamatan::find()->all(), 'kecamatanId', 'kecamatanNama');
$dataKel = ArrayHelper::map(app\models\MKelurahan::find()->all(), 'kelurahanId', 'kelurahanNama');

?>

<div class="muser-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'

   ]); ?>

    <?= $form->field($model, 'userNamaDepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNamaBelakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKelamin')->dropDownList(['L'=>'Laki-laki','P'=>'Perempuan'])->label("Jenis Kelamin") ?>

    <?= $form->field($model, 'userDOB')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tgl Lahir ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]])->label('Tgl Lahir');
    ?>
    
    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'userAlamat')->textarea(['maxlength' => true,'rows' => 4]) ?>

    
    <?=
    $form->field($model, 'userKota')->dropDownList($dataKota, [
        'id' => 'kota-id',
        'prompt' => '-- Pilih Kota --'
    ])->label("Kota")
    ?>

    <?=
    $form->field($model, 'userKecamatan')->widget(DepDrop::classname(), [
        'data' => $dataKec,
        'options' => ['id' => 'kec-id'],
        'pluginOptions' => [
            'depends' => ['kota-id'],
            'initialize' => true,
            'placeholder' => '-- Pilih Kecamatan --',
            'url' => Url::to(['t-order/list-kec'])
        ]
    ])->label("Kecamatan")
    ?>

    <?=
    $form->field($model, 'userKelurahan')->widget(DepDrop::classname(), [
        'data' => $dataKel,
        'options' => ['id' => 'kel-id'],
        'pluginOptions' => [
            'depends' => ['kec-id'],
            'initialize' => true,
            'placeholder' => '-- Pilih Kelurahan --',
            'url' => Url::to(['t-order/list-kel'])
        ]
    ])->label("Kelurahan")
    ?>

    <?= $form->field($model, 'userDaerah')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'userKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNoTelp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNoHp')->textInput(['maxlength' => true]) ?>

     <?php
    if(!$model->isNewRecord){
    ?>


    <?= $form->field($model, 'userStatus')->checkbox(); ?>

    <?php
}

    ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
