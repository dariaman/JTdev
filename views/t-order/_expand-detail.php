<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

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

Modal::begin(['id' =>'PopupRekan','size' => 'modal-lg',]);
Modal::end();

?>
<div class="torder-detail-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'service',
            'serviceKategori',
            'serviceDetail',
            'satuan',
            'Qty',
            'HargaSatuan',
            [
                'label'=>'Rekan Tukang',
                'format' => 'raw',
                'value' => function($data){
                    if($data["RekanTukang"] == ''){
                        return  Html::a('...', ['/t-order/update-rekan','id'=>$data['orderDetailId']],
                                ['class' => 'btn btn-success', 'class' => 'popupModal']);
                    }else{
                        return  Html::a($data['RekanTukang'], ['/t-order/update-rekan','id'=>$data['orderDetailId']],
                                ['class' => 'btn btn-success', 'class' => 'popupModal']);
                    }
                }
            ],
            'RekanTukang',
            [
                'label'=>'Tgl Pengerjaan',
                'format'=>['date', 'php:d M Y'],
                'value'=>'TglPengerjaan'
            ],
            'JamPengerjaan',
            'Keluhan',
            'DetailKeluhan',
            'DetailProperti',
            [
                'header' => 'Print WO',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('',['print-wo','rekanid' => $data['rekanId'],'orderid' => $data['orderId']],['class'=>'glyphicon glyphicon-print']);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
