<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VoucherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vouchers';
$this->params['breadcrumbs'][] = $this->title;

$script = <<< JS
    $('#jobPop').click(function ()
     {
         $('#modal').modal('show')
         .find('#modalContent')
         .load($(this).attr('value'));
     }); 
JS;
$this->registerJs($script);
?>
<div class="voucher-index">
    
    <div class="voucher-form">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
            <?= Html::button('Generate', ['class' => 'btn btn-success','id' => 'jobPop']) ?>
        </p>
        <?php ActiveForm::begin(['layout' => 'horizontal','action' => ['generate']]); ?>
        <?php
            Modal::begin([
                'header'=>'<h4>Generate Voucher</h4>',
                'id'=>'modal',
                'size'=>'modal-md',
             ]);
        ?>
        <div id="modalContent">
            <?= Html::label('Jumlah Voucher') ?>
            <?= Html::textInput('jumlah','',['class' => 'form-control' ,'style' => 'width:200px;']) ?>
            <?= Html::label('Nominal Voucher') ?>
            <?= Html::textInput('amount','',['class' => 'form-control','style' => 'width:200px;']) ?>
            <br>
            <?= Html::submitButton('Generate' , ['class' => 'btn btn-success']) ?>

            <?php Modal::end(); ?>
        </div>
        <?php //$form->field($model, 'orderId')->textInput(['maxlength' => true]) ?>
        <?php ActiveForm::end(); ?>
        <br>
    </div>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'voucherNo',
            'amount',
            'orderId',

//            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
</div>
