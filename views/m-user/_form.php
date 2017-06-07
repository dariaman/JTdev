<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MUser */
/* @var $form yii\widgets\ActiveForm */
$kota = ArrayHelper::map(app\models\MKota::find()->asArray()->all(), 'kotaId', 'kotaNama');
$kelurahan = ArrayHelper::map(app\models\MKelurahan::find()->asArray()->all(), 'kelurahanId', 'kelurahanNama');
$kecamatan = ArrayHelper::map(app\models\MKecamatan::find()->asArray()->all(), 'kecamatanId', 'kecamatanNama');
?>

<div class="muser-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'layout' => 'horizontal'

   ]); ?>

    <?= $form->field($model, 'userNamaDepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userNamaBelakang')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userPassword')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userAlamat')->textarea(['maxlength' => true,'rows' => 4]) ?>

    <?=
    $form->field($model, 'userKota')->widget(Select2::classname(), [
       'data' => $kota,
       'options' => ['placeholder' => '--Pilih Kota--'],
       'pluginOptions' => [
           'allowClear' => true
       ],
       ])
    ?>

    <?=
        $form->field($model, 'userKelurahan')->widget(Select2::classname(), [
        'data' => $kelurahan,
        'options' => ['placeholder' => '--Pilih Kelurahan--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])
    ?>

    <?=
        $form->field($model, 'userKecamatan')->widget(Select2::classname(), [
        'data' => $kecamatan,
        'options' => ['placeholder' => '--Pilih Kecamatan--'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ])
    ?>

    <?= $form->field($model, 'userDaerah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userKelamin')->textInput(['maxlength' => true]) ?>
    
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
