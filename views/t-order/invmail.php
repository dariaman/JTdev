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
        ->andWhere(['o.orderStatus' => 1])
        ->andWhere(['td.orderDetailStatus' => 1])
        ->all();
//echo var_dump($header);
//die();
$biayatransport = ($header[0]['IsFreeOngkir'] =='1' ? 0 : $header[0]['orderBiayaTransport'] );
?>
<div class="content-wrapper">
    <section class="content-header">
        <center><h3><strong><?= strtoupper('invoice');?> Jagonya Tukang</strong></h3></center>
        
    </section>
    
    <!-- Main content -->
    <section class="invoice">
        
        <!-- info row -->
        <div class="row invoice-info" style="margin-top:50px;">
            <div><label>Tanggal Order : <?= date('j F Y',strtotime($header[0]['orderTgl'])) ?></label></div>
            <div class="col-sm-4 invoice-col">                
              <address>
                  <table border="0" style="width: 100%">
                        <tr>
                            <td><strong>Nama </strong></td>
                            <td> : <?= $header[0]['userNamaDepan'] . ' ' . $header[0]['userNamaBelakang'];?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat </strong></td>
                            <td> : <?= $header[0]['userAlamat'];?></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon </strong></td>
                            <td> : <?= $header[0]['userNoTelp'] ;?></td>
                        </tr>
                  </table>

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
          <table class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th style="text-align: right;width:25px">No. </th>
                    <th>Jasa</th>
                    <th style="text-align: center;">Kuantitas</th>
                    <th style="text-align: center;">Harga Satuan</th>
                    <th style="text-align: center;">Total</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; 
                $sub=0;
                foreach ($detail as &$val) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $val['serviceKategoriJudul'].' Jasa '.$val['serviceDetailJudul'].' '.$val['kapasitasJudul'] ?></td>
                    <td style="text-align: right;width:100px;"><?= $val['orderDetailQTY'] ?></td>
                    <td style="text-align: right;width:125px;"><?= number_format($val['kapasitasHarga']) ?></td>
                    <td style="text-align: right;width:100px;"><?= number_format($val['orderDetailQTY'] * $val['kapasitasHarga']); ?></td>
                </tr>
            <?php $i++; 
                $sub += $val['orderDetailQTY'] * $val['kapasitasHarga'];
                }?>
            </tbody>
            <tr><td colspan="5"><hr/></td></tr>
            <tr>
                <th style="text-align: right;" colspan="4">Subtotal : </th> 
                <td style="text-align: right;"> <?= number_format($sub); ?></td>
            </tr>
            <tr>
                <th style="text-align: right;" colspan="4">Transportasi : </th> 
                <td style="text-align: right;"> <?= number_format($biayatransport) ?></td>
            </tr>
            <tr>
                <th style="text-align: right;" colspan="4">Total : </th> 
                <td style="text-align: right;"> <?= number_format($sub + $biayatransport ) ?></td>
            </tr>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row" style="margin-top: 100px;">
        <!-- /.col -->
        <div class="col-xs-6" style="margin-left:415px;">
          <div class="table-responsive">
          
          </div>
        </div>
        <!-- /.col -->
      </div>
          
      <div class="row">
        <div>
            <p style="font-size:8pt;">
                Harap lakukan pembayaran ke nomor rekening: <br><strong>BCA : 0840800199 a/n : PT SOLUSI SEKAWAN SEJAHTERA</strong><br> Dengan menyertakan nomor order di berita transfer untuk memudahkan proses pengecekan pembayaran.<br> 
                Segera lakukan konﬁrmasi pembayaran kepada kami via:<br>  1. Telepon: 021 5793 1331, atau <br>  2. WA: 0811 201 8810, atau <br>  3. email: halo@jagonyatukang
            </p>
        </div>
        
        <div style="margin-top:30px; text-align: center; font-size:8pt; " >
            <b>PT. Solusi Sekawan Sejahtera</b> , Jl. Pejompongan Dalam No. 29, Jakarta Pusat 021 57931331 / 0811 201 8810, halo@jagonyatukang.com
        </div>
      </div>
      
      <!-- /.row -->
    </section>
    <div class="clearfix"></div>
</div>
