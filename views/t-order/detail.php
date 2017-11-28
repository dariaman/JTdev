<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Order Detail';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'id' => 'modal',
    'size' => 'modal-md'
]);
echo "<div id=modalcontent></div>";
Modal::end();

Modal::begin(['id' => 'modalGrid']);
Modal::end();

// echo var_dump($modelh);

$biayatransport = ($modelh->IsFreeOngkir == '1' ? 0 : $modelh->orderBiayaTransport);
// echo var_dump($biayatransport);
// die();

?>
<div class="torder-index">

    <h1>Order Header</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>
    <table class="table table-striped table-bordered">
        <tr style="width: 50%;">
            <td style="width: 150px"><b>Order ID</b></td> 
            <td>: <?= $modelh->orderId ?></td>

            <td><b>Customer</b></td>
            <td>: <?= $modelh->muser->userNamaDepan . ' ' . $modelh->muser->userNamaBelakang ?></td>
        </tr>
        <tr>
            <td><b>Tgl Order</b></td>
            <td>: <?= $modelh->orderTgl ?></td>

            <td style="width: 150px" rowspan="2"><b>Alamat</b></td> 
            <td rowspan="2">: <?= $modelh->orderAlamat ?></td>
        </tr>
        <tr>
            <td><b>Jenis Pembayaran</b></td>
            <td>: <?= ($modelh->orderJenisBayar == '1' ? 'Tunai' : ($modelh->orderJenisBayar == '2' ? 'Transfer' : 'EDC')) ?></td>
        </tr>
        <tr>
            <td><b>Biaya Transport</b></td>
            <td>: <?= ($modelh->IsFreeOngkir == '1' ? 'Free' : number_format($biayatransport)) ?></td>

            <td><b>Kota</b></td>
            <td>: <?= ($modelh->kota->kotaNama ?? '') ?></td>
        </tr>
        <tr>
            <td><b>Total Tagihan</b></td>
            <td>: <?= number_format($modelh->total + $biayatransport) ?></td>

            <td><b>Kecamatan</b></td>
            <td>: <?= ($modelh->kec->kecamatanNama ?? '') ?></td>
        </tr>

        <tr>
            <td><b>Status Pekerjaan</b></td>
            <td>: <?= ($modelh->StatusPekerjaan == '2' ? html::label('Done', '', ['style' => ['color' => 'green']]) :
                    ($modelh->StatusPekerjaan == '1' ? html::label('Process', '', ['style' => ['color' => 'red']]) 
                        : html::label('Open', '', ['style' => ['color' => 'red']])))
    ?></td>

            <td><b>Kelurahan</b></td>
            <td>: <?= ($modelh->kel->kelurahanNama ?? '') ?></td>

        </tr>


        <tr>
            <td><b>Status Pembayaran</b></td>
            <td>: <?= ($modelh->StatusBayar == 'P' ? 'Paid' : '<strong style="color: red;">Pending</strong>') ?></td>

            <td><b>Kode Pos</b></td>
            <td>: <?= $modelh->orderKodePos ?></td>
        </tr>
        <tr>
            <td><b>Status Aktif</b></td>
            <td>: <?= ($modelh->orderStatus == '1' ? html::label('<span class="glyphicon glyphicon-ok"></span>', '', ['style' => ['color' => 'green']]) : html::label('<span class="glyphicon glyphicon-remove"></span>', '', ['style' => ['color' => 'red']]))
    ?></td>
            
            <td></td>
            <td></td>
        </tr>
    </table>
    <p align="left">
        <?=
        Html::button('Ubah Order Header', ['value' => Url::to(['update', 'id' => $modelh->orderId]),
            'id' => 'btnEditHeaderModal', 'class' => 'btn btn-success']);
        ?>

        <?= Html::a('<i class="glyphicon glyphicon-print"></i>  Print Invoice', ['print-inv', 'orderid' => $modelh->orderId], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
    </p>

    <hr style="border: solid 1px; " />
    <h3>Order Detail</h3>
    <p align="right">
        <?=
        Html::button('Tambah Order Detail', ['value' => Url::to(['create-detail', 'id' => $modelh->orderId]),
            'id' => 'btnaddDetailModal', 'class' => 'btn btn-success']);
        ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $modeld,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'ID Detail',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'right', 'style' => 'width: 50px;'],
                'attribute' => 'orderDetailId',
                'value' => function($data){
                    return Html::a($data['orderDetailId'], ['update-detail', 'id' => $data->orderDetailId],['class' => 'popupModal']);
                }
            ],
            [
                'header' => 'Jadwal Pengerjaan',
                'contentOptions' => ['style' => 'width: 150px;'],
                'value' => function($data) {
                    return $data['orderDetailTglKerja'] . " " . $data['orderDetailWaktuKerja'];
                }
            ],
            [
                'header' => 'Product',
                'attribute' => 'servicedetail.serviceDetailJudul',
            ],
            [
                'header' => 'Rekan Tukang',
                'attribute' => 'rekan.rekanNamaLengkap',
            ],
            [
                'header' => 'Keluhan',
                'attribute' => 'orderDetailKeluhan',
            ],
            [
                'header' => 'Properti',
                'attribute' => 'orderDetailProperti',
            ],
            [
                'header' => 'Qty',
                'attribute' => 'orderDetailQTY',
            ],
            [
                'header' => 'Harga Satuan',
                'format' => 'decimal',
                'attribute' => 'HargaSatuan',
            ],
           [
               'header' => 'StatusPengerjaan',
               'value' => function($data){
                    return ($data['StatusPekerjaan'] == '2' ? 'Done' : ($data['StatusPekerjaan'] == '1') ? 'Process' : 'Open');
               }
           ],
           [
                'header' => 'Ket Hasil Pengerjaan',
                'attribute' => 'FeedBackWO',
            ],
            [
                'header' => 'StatusAktif',
                'attribute' => 'orderDetailStatus',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->orderDetailStatus == 1) {
                        return html::label('<span class="glyphicon glyphicon-ok"></span>', '', ['style' => ['color' => 'green']]);
                    } else {
                        return html::label('<span class="glyphicon glyphicon-remove"></span>', '', ['style' => ['color' => 'red']]);
                    }
                }
            ],
            // [
            //     'header' => '',
            //     'format' => 'raw',
            //     'value' => function($data) {
            //         return Html::a('', ['update-detail', 'id' => $data->orderDetailId], ['class' => 'glyphicon glyphicon-pencil popupModal']);
            //     }
            // ],
            [
                'header' => 'WO',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a('',['print-wo','orderdetailid' => $data['orderDetailId']],['class'=>'glyphicon glyphicon-print','target'=>'_blank','data-pjax' => '0']);
                }
            ],
        ],
    ]);
    ?>


</div>
<?php
$script = <<<SKRIPT
        
$('#btnEditHeaderModal').click(function(){
    $('#modal').modal('show')
        .find('#modalcontent')
        .load($(this).attr('value'));        
});        

$('#btnaddDetailModal').click(function(){
    $('#modal').modal('show')
        .find('#modalcontent')
        .load($(this).attr('value'));        
});
        
$(function() {
   $('.popupModal').click(function(e) {
     e.preventDefault();
     $('#modalGrid').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
});
        
SKRIPT;

$this->registerJs($script);

