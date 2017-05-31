<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MRekanJt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrekan-jt-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'rekanNamaLengkap')->textInput(['maxlength' => true])->label("Nama Lengkap") ?>

    <?= $form->field($model, 'rekanKelamin')->radioList(array('L'=>'Laki-laki','P'=>'Perempuan'))->label("Jenis Kelamin"); ?>

    <?= $form->field($model, 'rekanSpesifikasi')->textInput(['maxlength' => true])->label("Spesialisasi") ?>

    <?= $form->field($model, 'rekanAlamat')->textarea(['rows' => 3])->label("Alamat") ?>

    <?= $form->field($model, 'rekanEmail')->textInput(['maxlength' => true])->label("Email") ?>

<?=
    $form->field($model, 'rekanKota')
     ->dropDownList(
            ArrayHelper::map(app\models\MKota::find()->asArray()->all(), 'kotaId', 'kotaNama'))
?>

<?=
    $form->field($model, 'rekanKelurahan')
     ->dropDownList(
            ArrayHelper::map(app\models\MKelurahan::find()->asArray()->all(), 'kelurahanId', 'kelurahanNama'))
?>

<?=
    $form->field($model, 'rekanKecamatan')
     ->dropDownList(
            ArrayHelper::map(app\models\MKecamatan::find()->asArray()->all(), 'kecamatanId', 'kecamatanNama'))
?>



    <?= $form->field($model, 'rekanKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanNoHp')->textInput(['maxlength' => true]) ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
