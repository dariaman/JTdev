<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\bootstrap\Modal;

$this->title = 'Work Order';
$this->params['breadcrumbs'][] = $this->title;

$script = <<<SKRIPT
        
    $(function() {
       $('.popupModal').click(function(e) {
         e.preventDefault();
         $('#PopupRekan').modal('show').find('.modal-content')
         .load($(this).attr('href'));
       });
    });

SKRIPT;
$this->registerJs($script);
?>
<div class="torder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php
Modal::begin(['id' =>'PopupRekan','size' => 'modal-lg',]);
Modal::end();
?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'orderId',
                'contentOptions' => ['style' => 'width: 25px;'],
                'value'=>'orderId'
            ],
            [
                'label'=>'Customer',
                'value'=>'userNamaDepan'
            ],
            [
                'label'=>'Tgl order',
                'format'=>['date', 'php:d M Y'],
                'value'=>'orderTgl'
            ],
            [
                'label'=>'kota',
                'value'=>'kotaNama'
            ],
            [
                'label'=>'Service',
                'value'=>'serviceJudul'
            ],
            [
                'label'=>'Service Kategori',
                'value'=>'serviceKategoriJudul'
            ],
            [
                'label'=>'Service Detail',
                'value'=>'serviceDetailJudul'
            ],
            [
                'label'=>'Rekan Tukang',
                'format' => 'raw',
//                'value'=>'rekanNamaLengkap',
                'value' => function($data){
                    if($data["rekanNamaLengkap"] == ''){
                        return  Html::a('...', ['/t-order/update-rekan','id'=>$data['orderDetailId']],
                                ['class' => 'btn btn-success', 'class' => 'popupModal']);
                    }else{
                        return  Html::a($data['rekanNamaLengkap'], ['/t-order/update-rekan','id'=>$data['orderDetailId']],
                                ['class' => 'btn btn-success', 'class' => 'popupModal']);
                    }
                }
            ],
            [
                'header' => 'Print WO',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Print WO',['print-wo','rekanid' => $data['rekanId'],'orderid' => $data['orderId']]);
                }
            ]
        ],
    ]); ?>
</div>
