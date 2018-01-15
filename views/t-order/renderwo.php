<?php

$header = (new \yii\db\Query())
        ->select('*')
        ->from('t_order as o')
        ->innerJoin('t_order_detail as td','o.orderID = td.orderId')
        ->innerJoin('m_user mu','mu.userId=o.userId')
        ->where(['td.orderDetailId' => $orderdetailid])
        ->all();

$tukang = (new \yii\db\Query())
        ->select('mj.`rekanNamaLengkap`')
        ->from('t_order_detail as td')
        ->leftJoin('m_rekan_jt mj','mj.`rekanId`=td.`rekanId`')
        ->where(['td.`orderDetailId`' => $orderdetailid])
        ->distinct()
        ->all();

$detail = (new \yii\db\Query())
        ->select('*')
        ->from('t_order_detail as td')
        ->leftJoin('t_order o','o.orderID = td.orderId')
        ->leftJoin('m_rekan_jt rj','rj.rekanId = td.rekanId')
        ->leftJoin('m_service_detail msd','msd.serviceDetailId = td.serviceDetailId')
        ->leftJoin('m_service ms','ms.serviceId = msd.serviceId')
        ->leftJoin('m_service_kategori msk','msk.serviceKategoriId = msd.serviceKategoriId')
        ->leftJoin('m_kapasitas_detail mkd','mkd.kapasitasId = td.kapasitasId')
        ->where(['td.orderDetailId' => $orderdetailid])
        // ->andWhere(['td.orderDetailId' => 1])
        ->andWhere(['o.orderStatus' => 1])
        ->andWhere(['td.orderDetailStatus' => 1])
        ->all();

// echo var_dump($header);
// die();
$biayatransport = ($header[0]['IsFreeOngkir'] =='1' ? 0 : $header[0]['orderBiayaTransport'] );
?>
<div class="content-wrapper">
    <section class="content-header">
        <div style="padding-top:50px; padding-bottom:-150px;">
            <img src="../web/img/image001.jpg" height="100">
        </div>
        <div style="margin-left:300px; margin-bottom: 30px;">
            <label>Jagonya Tukang</label>
        </div>
        <div style="margin-left:500px;"><br>
            <label>Tanggal Order : <?= date('j F Y',strtotime($header[0]['orderTgl'])) ?></label>
        </div>
        <h3 style="margin-left:40%; margin-top: -20px;"><strong><?= strtoupper('work order');?></strong></h3>
        <div style="margin-left:44%;">No. Order OD#<?= $orderdetailid;?></div>
    </section>
    
    <!-- Main content -->
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info" style="margin-top:50px;">
            <div class="col-sm-4 invoice-col">
              <address>
                  <table border="0">
                        <tr>
                            <td><strong>Nama Customer </strong></td>
                            <td> : <?= ucfirst($header[0]['userNamaDepan']). ' ' . ucfirst($header[0]['userNamaBelakang']);?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat Customer </strong></td>
                            <td> : <?= $header[0]['orderAlamat'];?></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon Customer </strong></td>
                            <td> : <?= $header[0]['userNoHp'];?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Teknisi </strong></td>
                            <td> : 
                                <?php  
                                    $i=0;
                                    foreach ($tukang as $tuk){
                                        if($i!==0) echo ', ';
                                        echo $tuk['rekanNamaLengkap'];
                                        $i++;
                                    }
                                ?>
                            </td>
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
        <div class="col-xs-12">
            <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center;width:25px;">No. </th>
                    <th style="text-align:center;width:630px;">Jasa</th>
                    <th style="text-align:right;width:25px;">Kuantitas</th>
                </tr>
            </thead>
            <?php $i=1; 
                foreach ($detail as &$val) { ?>
                <tr>
                    <td style="text-align:right;width:25px;"> <?= $i++ ?> . </td>
                    <td style="text-align:left;width:630px;"><?= $val['serviceKategoriJudul'].' Jasa '.$val['serviceDetailJudul'].' '.$val['kapasitasJudul'] ?></td>
                    <td style="text-align:right;width:25px;"><?= $val['orderDetailQTY'] ?></td>
                    
                </tr>
            <?php }?>
            <tr><td colspan="5"><hr/></td></tr>
           
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <div>
            <h4>Catatan Order</h4>
        </div>
          <table class="table table-bordered">            
            <tbody>
                <tr>
                    <td style="width:680px;"><?= $val['orderDetailKeluhan'] ?></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <div>
            <h4>Catatan Teknisi</h4>
        </div>
            <table class="table table-bordered">            
            <tbody>
                <tr>
                    <td style="width:680px; height:50px;"><?= $val['FeedBackWO'] ?></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="row">
          <div style="margin-left:15px;">
                <p style="font-size: 8pt;">Dengan menandatangai WO ini, maka saya menyatakan bahwa pekerjaan sesuai dengan work order telah selesai dilaksanakan.</p>
            </div>
        <div style="margin-left:80%; margin-bottom:100px;">
            Mengetahui,
        </div>
        <div style="margin-left:80%;">
            _____________________
        </div>
        <div style="margin-left:80%;">
            Konsumen
        </div>
        <div style="margin-top:-38px;">
            _____________________
        </div>
        <div style="margin-left:45px;">
            Teknisi
        </div>
        <div style="margin-top:30px; margin-left:150px; text-align: center; font-size:8pt; width:400px;" >
            <b>PT. Solusi Sekawan Sejahtera</b> , Jl. Pejompongan Dalam No. 29, Jakarta Pusat 021 57931331 / 0811 201 8810, halo@jagonyatukang.com
        </div>
      </div>
      
      <!-- /.row -->
    </section>
    <div class="clearfix"></div>
</div>
