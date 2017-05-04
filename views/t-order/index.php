<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order';
$this->params['breadcrumbs'][] = $this->title;

$script = <<<SKRIPT
        
    $(function() {
       $('.popupEditHeader').click(function(e) {
            e.preventDefault();
            $('#PopupEdit').modal('show').find('.modal-content')
            .load($(this).attr('href'));
       });
    });

SKRIPT;
$this->registerJs($script);

Modal::begin([
    'id' =>'PopupEdit',
    'size' => 'modal-lg',
    'header' => 'Update Header',
    'clientOptions' => [
        'backdrop' => 'static',
    ],
]);
Modal::end();
?>
<div class="torder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'export'=>false,
            'pjax'=>true,
            'hover'=>TRUE,
//            'showPageSummary'=>true,
            'columns'=>[
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model, $key, $index, $column) {
//                    $searchModel = new TOrderDetailSearch();
//                    $searchModel->orderId = $model->orderId;
//                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $query = new \yii\db\Query;
                    $query->select('td.`orderDetailId`,td.`orderId`,mr.`rekanId`,
                                ms.`serviceJudul` as service,
                                mk.`serviceKategoriJudul` as serviceKategori,
                                md.`serviceDetailJudul` as serviceDetail,
                                kd.`kapasitasJudul` as satuan,
                                td.`orderDetailQTY` as Qty,
                                kd.`kapasitasHarga` as HargaSatuan,
                                mr.`rekanNamaLengkap` as RekanTukang,
                                td.`orderDetailTglKerja` as TglPengerjaan,
                                td.`orderDetailWaktuKerja` as JamPengerjaan,
                                td.`orderDetailKeluhan` as Keluhan,
                                td.`orderDetailNote` as DetailKeluhan,
                                td.`orderDetailProperti` as DetailProperti')
                            ->from('`t_order_detail` td')
                            ->leftJoin('`m_service_detail` md', 'md.`serviceDetailId`=td.`serviceDetailId`')
                            ->leftJoin('`m_service` ms', 'ms.`serviceId`=md.`serviceId`')
                            ->leftJoin('`m_service_kategori` mk', 'mk.`serviceKategoriId`=md.`serviceKategoriId`')
                            ->leftJoin('`m_kapasitas_detail` kd', 'kd.`kapasitasId`=td.`kapasitasId`')
                            ->leftJoin('`m_rekan_jt` mr', 'mr.`rekanId`=td.`rekanId`')
                            ->where('td.`orderId`='.$key);
                    $dataProvider = new yii\data\ActiveDataProvider([
                        'query' => $query,
                        'sort' => false,
                    ]);
                    return Yii::$app->controller->renderPartial('_expand-detail', [
                        'dataProvider' => $dataProvider,
                    ]);
                },
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'expandOneOnly'=>true
            ],
            [
                'header' => 'Order ID',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a($data['orderId'], ['detail', 'id' => $data['orderId']]);
                }
            ],
                'muser.userNamaDepan',
            [
                'attribute' => 'orderTgl',
                'format' => ['date', 'php:d M Y'],
                'contentOptions' => ['Align' => 'center','style' => 'width: 150px;'],
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'header' => 'Jenis Bayar',
                'contentOptions' => ['Align' => 'center','style' => 'width: 100px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data)
                {
                    if($data['orderStatus'] = "1"){
                        return "Tunai";
                    }
                    else if($data['orderStatus'] = "2"){
                        return "Transfer";
                    }
                    else if($data['orderStatus'] = "3"){
                        return "Karu Kredit";
                    }
                }
            ],
            'orderAlamat',
            [
                'label' => 'Biaya Transport',
                'value' => 'orderBiayaTransport',
                'format' => ['decimal', 0],
                'contentOptions' => ['Align' => 'right','style' => 'width: 130px;'],
                'headerOptions' => ['style' => 'text-align:center']
            ],
            [
                'header' => 'Invoice',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a('',['print-inv','orderid' => $data['orderId']],['class'=>'glyphicon glyphicon-print']);
                }
            ],
            [
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('sdf',['update','id' => $data['orderId']],['class' => 'popupEditHeader']);
                }
            ],
            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
            
    ]);
?>
    <p>
        <?= Html::a('Buat Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
