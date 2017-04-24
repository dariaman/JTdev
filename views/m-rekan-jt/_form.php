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

    <?= $form->field($model, 'rekanNamaLengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanKelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanSpesifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanAlamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanWebsite')->textInput(['maxlength' => true]) ?>

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


    <?= $form->field($model, 'rekanDaerah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanNoHp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanKendaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rekanKendaraanNopol')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'rekanStatus')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
