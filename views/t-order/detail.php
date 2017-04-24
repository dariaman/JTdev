<?php

use yii\helpers\Html;
use kartik\grid\GridView;

$this->title = 'Order Detail';
$this->params['breadcrumbs'][] = $this->title;
$data = Yii::$app->db->createCommand("SELECT 
                                    tx.`orderId`, 
                                    mu.`userNamaDepan`,
                                    tx.`orderAlamat`
                                FROM `t_order` tx
                                INNER JOIN `m_user` mu ON mu.`userId`=tx.`userId`
                                WHERE tx.`orderId`=6")->queryOne();
?>
<div class="torder-index">

    <h1>Order Header</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <table class="table table-striped table-bordered " style="width: 500px;">
        <tr>
            <td style="width: 100px">Order ID</td> 
            <td><?= $data['orderId'] ?></td>
        </tr>
        <tr>
            <td>Customer</td> 
            <td><?= $data['userNamaDepan'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td> 
            <td><?= $data['orderAlamat'] ?></td>
        </tr>
        
    </table>
<h3>Order Detail</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'id',
                'serviceDetailJudul',
            'kapasitasJudul',
            'orderDetailTglKerja',
            'orderDetailWaktuKerja',

//            'orderDetailId',
//            'orderId',
//            'serviceDetailId',
//            'kapasitasId',
//            'rekanId',
//            'orderDetailTglKerja',
//            'orderDetailWaktuKerja',
//            'orderDetailKeluhan',
//            'orderDetailNote',
//            'orderDetailStatus',
//            'orderDetailQTY',
//            'orderDetailProperti',
//            [
//                'header' => 'Download Work Order',
//                'format' => 'raw',
//                'value' => function($data){
//                    return Html::a('Print WO',['print-wo','id' => $data['id'],'orderid' => $data['orderId']]);
//                }
//            ]
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Buat Order Detail', ['create-detail','id' => Yii::$app->request->get('id')], ['class' => 'btn btn-success']) ?>
    </p>
</div>
