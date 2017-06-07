<?php
use app\models\TOrder;

$id = Yii::$app->request->get('id');
$orderId = Yii::$app->request->get('orderid');

$db = (new \yii\db\Query())
        ->select('*')
        ->from('t_order_detail as td')
        ->innerJoin('t_order o','o.orderID = td.orderId')
        ->innerJoin('m_rekan_jt rj','rj.rekanId = td.rekanId')
        ->innerJoin('m_service_detail msd','msd.serviceDetailId = td.serviceDetailId')
        ->innerJoin('m_service ms','ms.serviceId = msd.serviceId')
        ->innerJoin('m_service_kategori msk','msk.serviceKategoriId = msd.serviceKategoriId')
        ->innerJoin('m_kapasitas_detail mkd','mkd.kapasitasId = td.kapasitasId')
        ->where(['td.orderId' => $orderId])
        ->andWhere(['td.orderDetailId' => $id])
        ->one();
?>

<html>
    <head>
        
    </head>
    <body>
        <div style="margin-left:45%; margin-bottom: 50px;">
            <label>Jagonya Tukang</label>
        </div>
        
        <div class="row">
            <div style="margin-left:85%">
                 <label><?= date('j F Y',strtotime($db['orderDetailTglKerja'])) ?></label>
            </div>  
            <div style="margin-left:40%; margin-top: -6%;">
                <h3><?= strtoupper('work order');?></h3>
            </div>
            <div style="margin-left:44%;">
                <p>No. Order OD#<?= $db['orderId'];?></p>
            </div>
            <br>
            <div style="margin-left:85%;">
                <p>Nama : <?= $db['rekanNamaLengkap'];?></p>
            </div>
            <div style="margin-left:68%;">
                <p>Alamat : <?= $db['rekanAlamat'];?></p>                
            </div>
            <div style="margin-left:79%;">
                <p>Telepon : <?= $db['rekanNoHp'];?></p>             
            </div>
        </div>
        <div class="rincian" style="margin-top:-20px; margin-bottom:20px;">
            <div>
                <h3>Rincian Jasa</h3>
            </div>
            <table border="1">
                <thead>
                    <tr>
                        <th style="width:10%;">Kuantitas</th>
                        <th style="width:70%;">Jasa</th>
                        <th style="width:20%; text-align:right;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:20%;"><?= $db['orderDetailQTY'] ?></td>
                        <td style="width:100%;"><?= $db['serviceKategoriJudul'].' Jasa '.$db['serviceDetailJudul'].' '.$db['kapasitasJudul'] ?> </td>
                        <td style="width:20%; text-align:right;"><?= $db['kapasitasHarga'] ?></td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-left:84%;">
                <?= 'Subtotal : <u>'.$db['kapasitasHarga'].'</u>' ?>
            </div>
            <div style="margin-left:80.1%;">
                <?= 'Transportasi : <u>0</u>' ?>
            </div>
            <div style="margin-left:80.9%;">
                <?= 'Total Harga : <u>'.$db['kapasitasHarga'].'</u>' ?>
            </div>
        </div>
        <div>
            <h3>Catatan Order</h3>
            <table border='1'>
                <tbody>
                    <tr>
                        <td style="width:680px;"><?= 'Tgl Kunj : '.date('dMy').', Teknisi : '.$db['rekanNamaLengkap'].', Note Tech : Pekerjaan '.$db['serviceKategoriJudul'].' selesai'  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <h3>Catatan Teknisi</h3>
            <table border='1'>
                <tbody>
                    <tr>
                        <td style="width:680px; height:100px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div>
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
            <b>PT. Solusi Sekawan Sejahtera</b> , Jl. Pejompongan Dalam No. 29, Jakarta Pusat 0215793 1331, halo@jagonyatukang.com
        </div>
        
    </body>
</html>
