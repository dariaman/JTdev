<?php

//$orderId = Yii::$app->request->get('orderid');

$header = (new \yii\db\Query())
        ->select('*')
        ->from('t_order as o')
        ->innerJoin('m_user mu','mu.userId=o.userId')
        ->where(['o.orderId' => $orderid])
        ->all();
$detail = (new \yii\db\Query())
        ->select('*')
        ->from('t_order as o')
        ->innerJoin('t_order_detail td','o.orderID = td.orderId')
        ->innerJoin('m_service_detail msd','msd.serviceDetailId = td.serviceDetailId')
        ->innerJoin('m_service ms','ms.serviceId = msd.serviceId')
        ->innerJoin('m_service_kategori msk','msk.serviceKategoriId = msd.serviceKategoriId')
        ->innerJoin('m_kapasitas_detail mkd','mkd.kapasitasId = td.kapasitasId')
        ->where(['o.orderId' => $orderid])
        ->all();
//echo var_dump($header);
//die();
?>
<div class="content-wrapper">
    <section class="content-header">
        <div style="padding-top:50px; padding-bottom:-150px;">
            <img src="../web/img/image001.jpg" height="100">
        </div>
        <div style="margin-left:300px; margin-bottom: 30px;">
            <label>Jagonya Tukang</label>
        </div>
        <div style="margin-left:500px;">
            <label>Tanggal Order : <?= date('j F Y',strtotime($header[0]['orderTgl'])) ?></label>
        </div>
        <h3 style="margin-left:40%; margin-top: -20px;"><strong><?= strtoupper('invoice');?></strong></h3>
    </section>
    
    <!-- Main content -->
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info" style="margin-top:50px;">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>Nama : </strong><?= $header[0]['userNamaDepan'] . ' ' . $header[0]['userNamaBelakang'];?><br>
                <strong>Alamat : </strong><?= $header[0]['userAlamat'];?><br>
                <strong>Telepon : </strong><?= $header[0]['userNoTelp'] ;?><br>
              </address>
            </div>
            <!-- /.col -->
        </div>
      <!-- /.row -->
      
      <!-- Table row -->
      <div class="row">
            <div style="margin-left:15px;">
                <h3>Rincian Jasa</h3>
            </div>
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th style="width:200px;">Jasa</th>
                    <th>Kuantitas</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                $sub=0;
                foreach ($detail as &$val) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $val['serviceKategoriJudul'].' Jasa '.$val['serviceDetailJudul'].' '.$val['kapasitasJudul'] ?></td>
                    <td><?= $val['orderDetailQTY'] ?></td>
                    <td><?= number_format($val['kapasitasHarga']) ?></td>
                    <td><?= number_format($val['orderDetailQTY'] * $val['kapasitasHarga']); ?></td>
                </tr>
            <?php $i++; 
                $sub += $val['orderDetailQTY'] * $val['kapasitasHarga'];
                }?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row" style="margin-bottom:-100px;">
        <!-- /.col -->
        <div class="col-xs-6" style="margin-left:415px;">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:150px">Subtotal</th>
                <td> : <?= number_format($sub); ?></td>
              </tr>
              <tr>
                <th>Transportasi</th>
                <td> : <?= $header[0]['orderBiayaTransport'] ?></td>
              </tr>              
              <tr>
                <th>Total</th>
                <td> : <?= number_format($sub + $header[0]['orderBiayaTransport'] ); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
          
      <div class="row">
        <div style="margin-left:80%; margin-bottom:100px;">
            Hormat Kami,
        </div>
        <div style="margin-left:540px;">
           (_____________________)
        </div>
        <div>
            <p style="font-size:8pt;">
                Harap lakukan pembayaran ke nomor rekening: <br><strong>BCA : 0840800199 a/n : PT SOLUSI SEKAWAN SEJAHTERA</strong><br> Dengan menyertakan nomor order di berita transfer untuk memudahkan proses pengecekan pembayaran.<br> 
                Segera lakukan konﬁrmasi pembayaran kepada kami via:<br>  1. Telepon: 021 5793 1331, atau <br>  2. WA: 0811 201 8810, atau <br>  3. email: halo@jagonyatukang
            </p>
        </div>
        
        <div style="margin-top:30px; margin-left:150px; text-align: center; font-size:8pt; width:400px;" >
            <b>PT. Solusi Sekawan Sejahtera</b> , Jl. Pejompongan Dalam No. 29, Jakarta Pusat 0215793 1331, halo@jagonyatukang.com
        </div>
      </div>
      
      <!-- /.row -->
    </section>
    <div class="clearfix"></div>
</div>
