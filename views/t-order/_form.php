<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\models\MKota;
use app\models\MKotaQuery;
use app\models\MKecamatan;
use app\models\MKecamatanQuery;
use app\models\MKelurahan;
use app\models\MKelurahanQuery;
use app\models\MUser;
/* @var $this yii\web\View */
/* @var $model app\models\TOrder */
/* @var $form yii\widgets\ActiveForm */

$dbKota = new MKota();
$dbKecamatan = new MKecamatan();
$dbKelurahan = new MKelurahan();

$queryKota = new MKotaQuery($dbKota);
$queryKecamatan = new MKecamatanQuery($dbKecamatan);
$queryKelurahan = new MKelurahanQuery($dbKelurahan);

$allKota = $queryKota->all();
$allKec = $queryKecamatan->all();
$allKel = $queryKelurahan->all();

$dropDownDataKota = ArrayHelper::map($allKota,'kotaId','kotaNama');
$dropDownDataKecamatan = ArrayHelper::map($allKec,'kecamatanId','kecamatanNama');
$dropDownDataKelurahan = ArrayHelper::map($allKel,'kelurahanId','kelurahanNama');

$cust = ArrayHelper::map(MUser::find()->aktif()->all(),'userId','userNamaDepan');
?>

<div class="torder-form">
    
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($model, 'userId')->widget(Select2::classname(), [
        'data' => $cust,
        'options' => ['id' => 'cat-ixd','placeholder' => 'Customer Order'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Customer"); ?>

    <?= $form->field($model, 'orderJenisBayar')->widget(Select2::classname(), [
        'data' => ['1' => 'Tunai','2' => 'Transfer','3' => 'Kartu Kredit'],
        'options' => ['placeholder' => 'Pilih Jenis Bayar ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'orderAlamat')->textArea(['rows' => '6']) ?>

    <?= $form->field($model, 'orderKota')->widget(Select2::classname(), [
        'data' => $dropDownDataKota,
        'options' => ['id' => 'cat-id','placeholder' => 'Pilih Kota ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'orderKecamatan')->widget(Select2::classname(), [
        'data' => $dropDownDataKecamatan,
        'options' => ['placeholder' => 'Pilih Kecamatan ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?=
    $form->field($model, 'orderKelurahan')->widget(Select2::classname(), [
        'data' => $dropDownDataKelurahan,
        'options' => ['placeholder' => 'Pilih Kelurahan ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'orderKodePos')->textInput(['maxlength' => true]) ?>

    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
