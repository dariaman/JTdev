<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use app\models\MUser;

$datax = MUser::find()->select(['userId', 'userNamaDepan' , 'userNamaBelakang'])->asArray()->all();
$datacust=array("","");
foreach ($datax as $item){
    array_push($datacust, array($item['userId'], $item['userNamaDepan']." ".$item['userNamaBelakang']));
    
}
//echo var_dump($datacust);
//die();
        
//$cust = ArrayHelper::map(MUser::find()->aktif()->all(), 'userId', ['userNamaDepan'.'userNamaBelakang']);

$dataKota = ArrayHelper::map(app\models\MKota::find()->all(), 'kotaId', 'kotaNama');
$dataKec = ArrayHelper::map(app\models\MKecamatan::find()->all(), 'kecamatanId', 'kecamatanNama');
$dataKel = ArrayHelper::map(app\models\MKelurahan::find()->all(), 'kelurahanId', 'kelurahanNama');
?>

<div class="torder-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <?php if($model->isNewRecord){ ?>
    <p align="right">
        <?= Html::a('New Customer', ['m-user/create-order'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    <?=
    $form->field($model, 'userId')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($datacust,0,1),
        'options' => ['id' => 'cat-ixd', 'placeholder' => 'Customer Order'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Customer");
    ?>


    <?=
    $form->field($model, 'orderJenisBayar')->widget(Select2::classname(), [
        'data' => ['1' => 'Tunai', '2' => 'Transfer', '3' => 'Kartu Kredit'],
        'options' => ['placeholder' => 'Pilih Jenis Bayar ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'orderAlamat')->textArea(['rows' => '6']) ?>

    <?=
    $form->field($model, 'orderKota')->dropDownList($dataKota, [
        'id' => 'kota-id',
        'prompt' => '-- Pilih Kota --'
    ])->label("Kota")
    ?>

    <?=
    $form->field($model, 'orderKecamatan')->widget(DepDrop::classname(), [
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
    $form->field($model, 'orderKelurahan')->widget(DepDrop::classname(), [
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

    <?= $form->field($model, 'orderKodePos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsFreeOngkir')->checkbox() ?>
    
    <?php if(!$model->isNewRecord){ ?>
        <?= $form->field($model, 'orderBiayaTransport')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'StatusBayar')->dropDownList(['P'=>'Paid','U'=>'Pending'], [
        ])->label("Status Bayar") ?>
    
        <?= $form->field($model, 'orderStatus')->checkbox() ?>
    <?php } ?>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
